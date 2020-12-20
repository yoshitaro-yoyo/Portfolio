@extends('layouts.app')

@section('content')

<div class="mt-5 container">

    <main>

        <section class="text-center pt-5 pb-2">
            <h2 class="mb-4">ユーザ情報</h2>
            <div class="container">
                <table class="table">
                    <tbody>
                        <tr>
                            <td class="text-center" style="width:20%">ユーザID</td>
                            <td style="width:80%">{{$user->id}}</td>
                        </tr>
                        <tr>
                            <td class="text-center">氏名</td>
                            <td>{{$user->first_name}} {{$user->last_name}}</td>
                        </tr>
                        <tr>
                            <td class="text-center">住所</td>
                            <td>〒{{$user->zipcode}}<br>{{$user->prefecture}} {{$user->municipality}} {{$user->address}} {{$user->apartments}}</td>
                        </tr>
                        <tr>
                            <td class="text-center">電話番号</td>
                            <td>{{$user->phone_number}}<br>
                        <tr>
                            <td class="text-center">メールアドレス</td>
                            <td>{{$user->email}}<br>
                    </tbody>
                </table>
            </div>
        </section>
        <div class="text-center">
            <a class="btn btn-primary" href="{{ route('users.edit', ['user' => $user]) }}">修正/退会する</a>
        </div>

    </main>

</div>

@endsection