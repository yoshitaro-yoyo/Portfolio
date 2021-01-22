<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\User;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | 商品詳細 → カート画面へのSession情報保存
    |--------------------------------------------------------------------------
    */
    public function addCart(Request $request)
    {
        //POST送信されてきた内容を確認したい場合
        //dd($_POST);

        //商品詳細画面のhidden属性で送信（Request）された商品IDと注文個数を取得し配列として変数に格納
        //inputタグのname属性を指定し$requestからPOST送信された内容を取得する。
        $cartData = [
            'session_products_id' => $request->products_id, 
            'session_quantity' => $request->product_quantity, 
        ];

        //session情報にcartDataという連想配列が「無い」場合
        if (!$request->session()->has('cartData')) {
            //商品情報の配列 cartData(key名)に、$cartData(配列)をSessionに追加
            $request->session()->push('cartData', $cartData);
        } else {
            //session情報にcartDataという連想配列が「有る」場合、情報取得
            $sessionCartData = $request->session()->get('cartData');
            //dd($sessionCartData);

            //flag定義 product_id同一確認フラグ = 同一ではない状態
            $flag = false;
            foreach ($sessionCartData as $index => $sessionData) {
                    //product_idが同一であれば、フラグをtrueにする → 個数の合算処理、及びセッション情報更新。更新は一度のみ
                    // dd($sessionData);
                if ($sessionData['session_products_id'] === $cartData['session_products_id'] ) {
                    $flag = true;
                    $quantity = $sessionData['session_quantity'] + $cartData['session_quantity'];
                    $request->session()->put('cartData.' . $index . '.session_quantity', $quantity);
                    break;
                }
            }

            //product_idが同一ではない状態を指定 その場合であればpushする
            if ($flag === false) {
                $request->session()->push('cartData', $cartData);
            }
            //dd($sessionCartData);
        }

        //POST送信された情報をsessionに保存 'users_id'(key)に$request内の'users_id'をセット
        $request->session()->put('users_id', ($request->users_id));
        return redirect()->route('cartlist.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*
    |--------------------------------------------------------------------------
    | カート内商品表示
    |--------------------------------------------------------------------------
    */
    public function index(Request $request)
    {
        //渡されたセッション情報をkey（名前）用いそれぞれ取得し変数に代入
        $cartData = $request->session()->get('cartData');
        $sessionUsersId = $request->session()->get('users_id');
        //dd($cartData);
        if (!empty($cartData)) {
            foreach ($cartData as &$data) {
                //二次元目の配列を指定している$dataに'product'key生成 $product内の各カラムを代入
                $product = Product::with('category')->find($data['session_products_id']);
                $data['product_name'] = $product->product_name;
                $data['category_name'] = $product['category']->category_name;
                $data['price'] = $product->price;

                //商品小計の配列作成し追加
                $itemPrice = $data['price'] * $data['session_quantity'];
                $data['itemPrice'] = $itemPrice;
            }

            //第二引数に指定したkeyの値を配列として変数に入れる
            $sessionProductsId = array_column($cartData, 'session_products_id');
            $sessionQuantity = array_column($cartData, 'session_quantity');
            // dd($sessionProductsId);

            //取得したidを元に各テーブルのカラムデータをDBから取得
            $sessionProducts = Product::find($sessionProductsId);
            // dd($sessionProducts);
            $sessionUsers = User::find($sessionUsersId);
            $user = Auth::user();

            //Productテーブルに該当IDが存在しない場合、戻り値としてnullが返される → issetで条件分岐を指定し例外処理を行う
            if (isset($sessionProducts)) {
            //&& $user == $sessionUsers
                return view('products.cartlist', compact('sessionUsers', 'cartData', 'totalPrice', 'user'));
            }

        } else {
            $user = Auth::user();
            return view('products.no_cart_list', compact('user'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*
    |--------------------------------------------------------------------------
    | 商品詳細画面
    |--------------------------------------------------------------------------
    */
    public function show($id)
    {
        //itemDetail/{id}に該当するidを元に対応するproductを取得
        $product = Product::find($id);
        if (!empty($product)) {
            //productのcategory_idを取得し、Category.phpを経由し該当idが所有するカテゴリー名を取得する(リレーション)
            $category_name = Category::find($product->category_id);
            $user = Auth::user();
            return view('products.prodinfo', compact('product', 'category_name', 'user'));
        } else {
            return redirect()->route('noProduct');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}