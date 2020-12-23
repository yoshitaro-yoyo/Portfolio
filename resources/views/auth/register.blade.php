@extends('layouts.app')
@section('content')
    <div class="jumbotron text-center bg-white">
        <h2>お客様情報登録</h2>
    </div>
    <div class="row ml-5 justify-content-center">
        <div class="col-lg-6">
            {!! Form::open(['route' => 'signup.post']) !!}
                <p>氏名</p>
                <div class="row">
                    {!! Form::label('last_name', '姓',['class' => 'mt-2 ml-4']) !!}
                    {!! Form::text('last_name', old('last_name'),['class' => 'form-control ml-1 col-lg-5']) !!}
                    {!! Form::label('first_name', '名',['class' => 'mt-2 ml-3']) !!}
                    {!! Form::text('first_name', old('first_name'),['class' => 'form-control ml-1 col-lg-5']) !!}
                </div>
                <div class="form-group mt-3">
                    {!! Form::label('zipcode', '郵便番号') !!}
                    {!! Form::text('zipcode', old('zipcode'),['class' => 'form-control ml-3 col-lg-6']) !!}
                </div>
                <div class="form-group">
                    <p class="mb-1">住所</p>
                    <div class="row">
                        {!! Form::label('prefecture', '都道府県',['class' => 'mt-2 ml-4']) !!}
                        {!! Form::text('prefecture', old('prefecture'),['class' => 'form-control col-lg-9 mt-1 ml-3']) !!}
                    </div>
                    <div class="row">
                        {!! Form::label('municipality', '市町村区',['class' => 'mt-2 ml-4']) !!}
                        {!! Form::text('municipality', old('municipality'),['class' => 'form-control col-lg-9 mt-1 ml-3']) !!}
                    </div>
                    <div class="row">
                        {!! Form::label('address', '番地',['class' => 'mt-2 ml-4']) !!}
                        {!! Form::text('address', old('address'),['class' => 'form-control col-lg-9 mt-1 ml-5']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('apartments', 'マンション・部屋番号',['class' => 'mt-1 ml-2']) !!}
                        <div class="offset-lg-1">
                                {!! Form::text('apartments', old('apartments'),['class' => 'form-control ml-5 col-lg-10']) !!}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('email', 'メールアドレス') !!}
                    {!! Form::text('email', old('email'),['class' => 'form-control col-lg-11 ml-3']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('phone_number', '電話番号') !!}
                    {!! Form::text('phone_number', old('phone_number'),['class' => 'form-control col-lg-11 ml-3']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('password','パスワード') !!}
                    {!! Form::password('password', ['class' => 'form-control col-lg-8 ml-3']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('password_confirmation', 'パスワード再入力') !!}
                    {!! Form::password('password_confirmation', ['class' => 'form-control col-lg-8 ml-3']) !!}
                </div>
                <div class="row justify-content-center">
                    {!! Form::submit('登録', ['class' => 'btn btn-primary mt-3 col-lg-3']) !!}
                </div>
            {!! Form::close() !!}
            <div class="mt-5 mb-5 text-center">
                <h4><a href="login">ログインはこちらから</a></h4>
            </div>
        </div>
    </div>
@endsection
