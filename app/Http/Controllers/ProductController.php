<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\User;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function addCart(Request $request)
    {
        //POST送信されてきた内容を確認したい場合
        //dd($_POST);

        //商品詳細画面のhidden属性で送信（Request）された商品IDと注文個数を取得し変数に格納
        $data = [
            'products_id' => $request->products_id, 
            'ses_qty' => $request->prodqty, 
        ];

        //新しい値を配列のセッション値へ追加 productキーに配列が含まれているなら、新しい値を追加
        $request->session()->push('products', $data);

        //POST送信された情報をsessionに保存 'product_id'というセッションキー(名前)に'product_id'をセット（$requestから取得）
        $request->session()->put('products_id', ($request->products_id));
        $request->session()->put('ses_qty', ($request->prodqty));
        $request->session()->put('users_id', ($request->users_id));

        //上記のセッション情報をリダイレクト時にカートリスト画面に渡す
        return redirect('cartlist');
    }

    // 指定したデータをセッションから取得後、そのデータを削除する
    //$value = $request->session()->pull('key', 'default’);

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //渡されたセッション情報をkey（名前）用いそれぞれ取得し変数に代入
        $sesQty = $request->session()->get('ses_qty');
        $sesProductsId = $request->session()->get('products_id');
        $sesUsersId = $request->session()->get('users_id');

        //取得したユーザ・productIDを元にデータをDBから取得
        $sesProducts = Product::find($sesProductsId);
        $sesUsers = User::findOrFail($sesUsersId);

        //productIDに対応するcategoryテーブル内のカラムを取得 Viewへカラム内の任意のフィールドを表示させる際に使用する。
        $sesCategoryNames = Category::find($sesProducts->id);

        $sesData = [
            'sesProducts' => $sesProducts, 
            'sesCategoryNames' => $sesCategoryNames, 
            'sesQty' => $sesQty, 
        ];
        //dd($sesProducts);
        //Productテーブルに該当IDが存在しない場合、戻り値としてnullが返される → issetで条件分岐を指定し例外処理を行う
        if (isset($sesProducts)) {
            return view('products.cartlist', compact('sesUsers', 'sesData'));
        } else {
            return redirect()->route('noProd');
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

    public function show($id)
    {
        //itemDetail/{id}に該当するidを元に対応するproductを取得
        $product = Product::findOrFail($id);
        //productのcategory_idを取得し、Category.phpを経由し該当idが所有するカテゴリー名を取得する(リレーション)
        $category_name = Category::findOrFail($product->category_id);
        $user = Auth::user();
        return view('products.prodinfo', compact('product', 'category_name', 'user'));
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
