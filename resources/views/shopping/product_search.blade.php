@extends('layouts.app')
@section('content')
<main>
    <div class="container">
        <div class="mx-auto">
            <div class="my-4 mx-auto" style="width: 200px">
                <h2 class="text-center">商品検索画面</h2>
            </div>
            <div class="row">
                <div class="col-sm">
                    <form method="GET" action="{{ route('product_search')}}">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">商品名</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="searchWord" value="{{ $searchWord }}">
                            </div>
                            <div class="col-sm-auto">
                                <button type="submit" class="btn btn-primary ">検索</button>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2">商品カテゴリ</label>
                            <div class="col-sm-3">
                                <select name="categoryId" class="form-control" value="{{ $categoryId }}">
                                    <option value="">未選択</option>
                                    @foreach($categories as $id => $category_name)
                                    <option value="{{ $id }}">
                                        {{ $category_name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @if ($products->count() > 0)
        <div class="productTable">
            <p>全{{ $products->count() }}件</p>
            <table class="table table-hover">
                <thead style="background-color: #FFD900">
                    <tr class="table-header">
                        <th class="text-left" width="55%">商品名</th>
                        <th class="text-left" width="15%">商品カテゴリ</th>
                        <th class="text-left" width="15%">価格</th>
                        <th class="text-left" width="15%"></th>
                    </tr>
                </thead>
                @foreach($products as $product)
                <tr>
                    <td>{{ $product->product_name }}</td>
                    <td>{{ $product->category->category_name }}</td>
                    <td>{{ $product->price }}円</td>
                    <td><a href="{{ route('prodinfo', ['id' => $product->id])}}" class="btn btn-primary btn-sm">商品詳細</a></td>
                </tr>
                @endforeach
            </table>
        </div>
        <div class="d-flex justify-content-center">
            {{ $products->appends(request()->input())->links() }}
        </div>
        @else
        <div class="d-flex justify-content-center mx-auto mt-4 bg-info w-25">
            <span>検索結果がありませんでした</span>
        </div>
        @endif
    </div>
</main>
@endsection