@extends('layouts.app')
@section('content')
    <main>
        <h2 class="d-flex justify-content-center"">ログイン画面</h2>
            @csrf
            {!! Form::open(['route' => 'login']) !!}
            <div class=" d-flex justify-content-center">
                <div class="form-group">
                    {!! Form::label('email', 'メールアドレス', ['class' => 'mt-3']) !!}
                    {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <div class="form-group">
                    {!! Form::label('password', 'パスワード', ['class' => 'mt-1']) !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <div class="form-group">
                    {{Form::submit('ログイン', ['class'=>'btn btn-primary btn-block mt-2'])}}
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <a class="btn btn-link" href="{{ route('register') }}">
                    まだ登録がお済みでない方はこちら
                </a>
            </div>
            {!! Form::close() !!}
    </main>
@endsection