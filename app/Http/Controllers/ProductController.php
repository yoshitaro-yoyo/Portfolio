<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use App\Order;
use App\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ProductController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | 商品検索
    |--------------------------------------------------------------------------
    */
    public function search(Request $request)
    {
        $searchWord = $request->input('searchWord');
        $categoryId = $request->input('categoryId');
        $query = Product::query();
        if (isset($searchWord)) {
            $query->where('product_name', 'like', '%' . self::escapeLike($searchWord) . '%');
        }
        //カテゴリが選択された場合の処理
        if (isset($categoryId)) {
            $query->where('category_id', $categoryId);
        }
        //カテゴリidの昇順(asc)に表示
        $products = $query->orderBy('category_id', 'asc')->paginate(15);

        $categories = Category::categoryList();
        return view('shopping.product_search', compact('products', 'categories', 'searchWord', 'categoryId', 'notice'));
    }

    // str_replaceでセキュリティ対策
    public static function escapeLike($str)
    {
        return str_replace(['\\', '%', '_'], ['\\\\', '\%', '\_'], $str);
    }

    /*
    |--------------------------------------------------------------------------
    | 商品詳細 → カート画面へのSession情報保存
    |--------------------------------------------------------------------------
    */
    public function addCart(Request $request)
    {
        //商品詳細画面のhidden属性で送信（Request）された商品IDと注文個数を取得し配列として変数に格納
        //inputタグのname属性を指定し$requestからPOST送信された内容を取得する。
        $cartData = [
            'session_products_id' => $request->products_id, 
            'session_quantity' => $request->product_quantity, 
        ];

        //sessionにcartData配列が「無い」場合、商品情報の配列をcartData(key)という名で$cartDataをSessionに追加
        if (!$request->session()->has('cartData')) {
            $request->session()->push('cartData', $cartData);
        } else {
            //sessionにcartData配列が「有る」場合、情報取得
            $sessionCartData = $request->session()->get('cartData');

            //sameProductId定義 product_id同一確認フラグ false = 同一ではない状態を指定
            $sameProductId = false;
            foreach ($sessionCartData as $index => $sessionData) {
                //product_idが同一であれば、フラグをtrueにする → 個数の合算処理、及びセッション情報更新。更新は一度のみ
                if ($sessionData['session_products_id'] === $cartData['session_products_id'] ) {
                    $sameProductId = true;
                    $quantity = $sessionData['session_quantity'] + $cartData['session_quantity'];
                    //cartDataをrootとしたツリー状の多次元連想配列の特定のValueにアクセスし、指定の変数でValueの上書き処理
                    $request->session()->put('cartData.' . $index . '.session_quantity', $quantity);
                    break;
                }
            }

            //product_idが同一ではない状態を指定 その場合であればpushする
            if ($sameProductId === false) {
                $request->session()->push('cartData', $cartData);
            }
        }

        //POST送信された情報をsessionに保存 'users_id'(key)に$request内の'users_id'をセット
        $request->session()->put('users_id', ($request->users_id));
        return redirect()->route('cartlist.index');
    }

    /*
    |--------------------------------------------------------------------------
    | カート内商品表示
    |--------------------------------------------------------------------------
    */
    public function index(Request $request)
    {
        //渡されたセッション情報をkey（名前）を用いそれぞれ取得、変数に代入
        $sessionUser = User::find($request->session()->get('users_id'));

        //removeメソッドでの配列削除時の配列連番抜け対策
        if ($request->session()->has('cartData')) {
            $cartData = array_values($request->session()->get('cartData'));
        }

        if (!empty($cartData)) {
            $sessionProductsId = array_column($cartData, 'session_products_id');
            $product = Product::with('category')->find($sessionProductsId);

            foreach ($cartData as $index => &$data) {
                //二次元目の配列を指定している$dataに'product〜'key生成 Modelオブジェクト内の各カラムを代入
                //＆で参照渡し 仮引数($data)の変更で実引数($cartData)を更新する
                $data['product_name'] = $product[$index]->product_name;
                $data['category_name'] = $product[$index]['category']->category_name;
                $data['price'] = $product[$index]->price;
                //商品小計の配列作成し、配列の追加
                $data['itemPrice'] = $data['price'] * $data['session_quantity'];
            }

            return view('products.cartlist', compact('sessionUser', 'cartData', 'totalPrice'));

        } else {
            
            return view('products.no_cart_list',  ['user' => Auth::user()]);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | カート内商品の削除
    |--------------------------------------------------------------------------
    */
    public function remove(Request $request)
    {
        //session情報の取得（product_idと個数の2次元配列）
        $sessionCartData = $request->session()->get('cartData');

        //削除ボタンから受け取ったproduct_idと個数を2次元配列に
        $removeCartItem = [
            ['session_products_id' => $request->product_id, 
            'session_quantity' => $request->product_quantity]
        ];

        //sessionデータと削除対象データを比較、重複部分を削除し残りの配列を抽出
        $removeCompletedCartData = array_udiff($sessionCartData, $removeCartItem, function ($sessionCartData, $removeCartItem) {
            $result1 = $sessionCartData['session_products_id'] - $removeCartItem['session_products_id'];
            $result2 = $sessionCartData['session_quantity'] - $removeCartItem['session_quantity'];
            return $result1 + $result2;
        });

        //上記の抽出情報でcartDataを上書き処理
        $request->session()->put('cartData', $removeCompletedCartData);
        //上書き後のsession再取得
        $cartData = $request->session()->get('cartData');

        //session情報があればtrue
        if ($request->session()->has('cartData')) {
            return redirect()->route('cartlist.index');
         }

        return view('products.no_cart_list', ['user' => Auth::user()]);
    }

    /*
    |--------------------------------------------------------------------------
    | カート内商品注文確定(DB登録)
    |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        //$request->session()->forget('cartData');
        $cartData = $request->session()->get('cartData');
        $now = Carbon::now();

        //インスタンス生成
        $order = new \App\Order;
        //指定値をインスタンス代入
        $order->user_id = Auth::user()->id;
        $order->order_date = $now;
        $order->order_number = rand();
        //認証済みのユーザーのみインスタンスへ保存
        Auth::user()->orders()->save($order);

        //Qrderテーブルの カラム「order_number」が「$order->order_number」の値を取得
        $savedOrder = Order::where('order_number', $order->order_number)->get();
        //上記Collectionから id の値だけを取得した配列に変換
        $savedOrderId = $savedOrder->pluck('id')->toArray();

        //注文詳細情報保存を注文数分繰り返す １回のリクエストを複数カラムに分けDB登録
        foreach ($cartData as $data) {
            //注文詳細情報に関わるインスタンス生成
            $orderDetail = new \App\OrderDetail;
            $orderDetail->product_id = $data['session_products_id'];
            $orderDetail->order_id = $savedOrderId[0];
            $orderDetail->shipment_status_id = 1;
            $orderDetail->order_quantity = $data['session_quantity'];
            $orderDetail->shipment_date = $now;
            $orderDetail->save();
        }

        //session削除
        $request->session()->forget('cartData');
        return view('products/purchase_completed', compact('order'));
    }

    /*
    |--------------------------------------------------------------------------
    | 商品詳細画面
    |--------------------------------------------------------------------------
    */
    public function show($id)
    {
        //itemDetail/{id}に該当するidを元にModelオブジェクト取得
        $product = Product::find($id);
        if (!empty($product)) {
            //productテーブルのcategory_idを取得、Category.phpを経由し該当idが所有するカテゴリー名を取得する(リレーション)
            $category_name = Category::find($product->category_id);
            $user = Auth::user();
            return view('products.productInfo', compact('product', 'category_name', 'user'));
        }

            return redirect()->route('noProduct');
    }
}
