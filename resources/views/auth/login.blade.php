@extends('layouts.app')
@section('content')
    <h2 class="d-flex justify-content-center mt-5 mb-3">ログイン画面</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="d-flex justify-content-center">
                <div class="form-group">
                    <label class="mb-0" for="email">メールアドレス</label>
                        <div>
                            <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required ="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <div class="form-group">
                    <label class="mb-0" for="password">パスワード</label>
                        <div>
                            <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required ="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">ログイン</button>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <a class="btn btn-link" href="{{ route('register') }}">
                    まだ登録がお済みでない方はこちら
                </a>
            </div>
        </form>
        @endsection