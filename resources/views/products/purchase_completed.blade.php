@extends('layouts.app')

@section('content')

    <main>

        <div class="blockquote mt-5 text-center">
            <h1 style="font-weight: bolder">購入完了しました</h1>
        </div>
        <div class="container-sm mt-5 text-center">
            <p class="h1">ご購入ありがとうございます！</p>
            <p class="h1">注文番号:{{ $order->order_number }}</p>
        </div>
        <div class="container text-center mt-5">
            <a class="btn btn-primary mt-5" href="{{ route('home', ['id' => Auth::user()]) }}">Topに戻る</a>
        </div>

    </main>

@endsection