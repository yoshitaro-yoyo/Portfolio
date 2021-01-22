<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\MProduct;
use App\MCategory;

class ProductController extends Controller
{
    public function search(Request $request)
    {
        $searchWord = $request->input('searchWord');
        $categoryId = $request->input('categoryId');
        $query = MProduct::query();
        if (isset($searchWord)) {
            $query->where('product_name', 'like', '%' . self::escapeLike($searchWord) . '%');
        }
        // //カテゴリが選択された場合の処理
        if (isset($categoryId)) {
            $query->where('category_id', $categoryId);
        }
        // カテゴリidの昇順(asc)に表示
        $products = $query->orderBy('category_id', 'asc')->paginate(15);
        // 検索結果がない場合
        $notice = $products->count() == 0 ? '検索結果がありませんでした…' : null;
        $category = new MCategory;
        $categories = $category->categoryList();
        return view('shopping.product_search', compact('products', 'categories', 'searchWord', 'categoryId', 'notice'));
    }
    // str_replaceでセキュリティ対策
    public static function escapeLike($str)
    {
        return str_replace(['\\', '%', '_'], ['\\\\', '\%', '\_'], $str);
    }
}
