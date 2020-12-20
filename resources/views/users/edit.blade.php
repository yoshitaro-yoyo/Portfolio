@extends('layouts.app')

@section('content')

    <main>
        <h2 class="text-center my-4">ユーザ情報修正</h2>

        <div class="row my-5 ml-5">
            <div class="col-sm-7 mx-auto">

                {!! Form::open(['route' => ['users.update', $user->id, 'class' => 'd-inline']]) !!}
                    {{ method_field('PUT') }}

                    <div class="form-group-sm">
                        <div class="ml-3 mb-4">
                            <label for="col-sm-6 col-form-label" class="mr-5">氏名</label>
                                {!! Form::label('first_name', '　　　姓', ['class' => 'd-inline']) !!}
                                {!! Form::text('first_name', $user->first_name, ['class' => 'form-control d-inline col-sm-3']) !!}
                                {!! Form::label('last_name', '名', ['class' => 'd-inline ml-3']) !!}
                                {!! Form::text('last_name', $user->last_name, ['class' => 'form-control d-inline col-sm-3']) !!}
                        </div>
                    </div>

                    <div class="form-group-sm">
                        <div class="ml-3 mb-4">
                            <label for="col-sm-4 col-form-label" class="mr-5">住所</label>
                            {!! Form::label('zipcode', '　　　〒', ['class' => 'd-inline']) !!}
                            {!! Form::text('zipcode', $user->zipcode, ['class' => 'form-control d-inline col-sm-4']) !!}
                        </div>
                    </div>

                    <div class="form-group-sm">
                        <div class="mb-4">
                            {!! Form::label('prefecture', '　　　都道府県', ['class' => 'col-form-label ml-5']) !!}
                            {!! Form::text('prefecture', $user->prefecture, ['class' => 'form-control d-inline col-sm-5']) !!}
                        </div>
                    </div>

                    <div class="form-group-sm">
                        <div class="mb-4">
                            {!! Form::label('municipality', '　　　市町村区', ['class' => 'col-form-label ml-5']) !!}
                            {!! Form::text('municipality', $user->municipality, ['class' => 'form-control d-inline col-sm-5']) !!}
                        </div>
                    </div>

                    <div class="form-group-sm">
                        <div class="mb-4">
                            {!! Form::label('address', '　　　　　番地', ['class' => 'col-form-label ml-5']) !!}
                            {!! Form::text('address', $user->address, ['class' => 'form-control d-inline col-sm-5']) !!}
                        </div>
                    </div>

                    <div class="form-group-sm">
                        <div class="mb-4">
                            {!! Form::label('apartments', '　　　部屋番号', ['class' => 'col-form-label ml-5']) !!}
                            {!! Form::text('apartments', $user->apartments, ['class' => 'form-control d-inline col-sm-5']) !!}
                        </div>
                    </div>

                    <div class="form-group-sm">
                        <div class="mb-4">
                            {!! Form::label('email', 'メールアドレス　　　', ['class' => 'col-form-label mr-1']) !!}
                            {!! Form::text('email', $user->email, ['class' => 'form-control d-inline col-sm-7']) !!}
                        </div>
                    </div>

                    <div class="form-group-sm">
                        <div class="mb-4z">
                            {!! Form::label('phone_number', '電話番号　　　', ['class' => 'col-form-label mr-5']) !!}
                            {!! Form::text('phone_number', $user->phone_number, ['class' => 'form-control d-inline col-sm-7']) !!}
                        </div>
                    </div>

                    <div class="btn-group ml-5" style="text-align:center" role="group" >
                        <div class="mt-5 ml-5">
                            <button class="btn btn-primary mr-5 ml-5"type="submit">　　修　正　　</button>
                        </div>

                {!! Form::close() !!}

                        <div class="mt-5 ml-5">
                            {!! Form::open(['route' => ['users.destroy', $user->id, 'class' => 'd-inline']]) !!}
                                {{method_field('DELETE')}}
                                 <button class="btn btn-danger mr-5 ml-5">　　退　会　　</button>
                            {!! Form::close() !!}
                        </div>
                    </div>
            </div>
        </div>
    </main>

@endsection
