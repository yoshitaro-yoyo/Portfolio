@extends('layouts.before_app')

@section('content')

    <body>
        <main>
            <h1 class="mt-5 text-center">やんばるエキスパート ECサイト</h1>
            <div class="row d-flex justify-content-center align-items-center">
              <div class="mt-3 mx-3 text-center">
              <p>
                まだアカウントを<br>
                お持ちでない方はこちら
              </p>
              <a class="btn btn-primary" href="{{ url('/register') }}" role="button">新規登録</a>
            </div>
              <div class="mt-3 mx-3 text-center">
              <p>
                すでにアカウントを<br>
                お持ちの方はこちら
              </p>
              <a class="btn btn-primary" href="{{ url('/login') }}" role="button">ログイン</a>
              </div>
            </div>
        </main>
    </body>

@endsection