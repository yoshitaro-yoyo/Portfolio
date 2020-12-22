@extends('layouts.app')

@section('content')

    <main>
        <div class="container">
            <div class="jumbotron bg-white">
                <h1 class="text-center">商品情報</h1>
                <h3 class="my-4 text-center">{{$product->product_name}}</h3>
                <div class="offset-sm-3">
                    <p class="offset-sm-6">商品カテゴリ：{{$category_name->category_name}}</p>
                    <p>商品説明</p>
                    <p>{{$product->description}}</p>
                    <p class="mt-4 mb-5">価格：{{$product->price}}円</p>
                </div>
                <div class="form-row justify-content-center">
                    <label for="order_quanity" class="mt-1">購入個数</label>
                    <div class="form-group col-sm-1">
                        <div class="ml-1">
                            <input type="text" class="form-control" id="order_quanity" pattern="[1-9][0-9]*" min="1">
                        </div>
                    </div>
                    <label class="mt-1 mr-3">個</label>
                    <div class="form-group">
                        <button type="button" class="btn btn-primary">カートへ</button>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection