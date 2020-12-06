@extends('layouts.app')

@section('content')

    <div class="mt-5 container">

        <main>

            <section class="text-center pt-5 pb-2">
                <h2 class="mb-4">ユーザ情報</h2>
                <div class="container">
                    <table class="table">
                        <tbody>
                        <tr><td class="text-center" style="width:20%">ユーザID</td><td style="width:80%">User</td></tr>
                        <tr><td class="text-center">氏名</td><td>○○ ☓☓</td></tr>
                        <tr><td class="text-center">住所</td><td>〒○〇〇-○○○○<br>沖縄県那覇市○○ ○-○-◯</td></tr>
                        <tr><td class="text-center">電話番号</td><td>○○○-○○○○-○〇〇○<br>
                        <tr><td class="text-center">メールアドレス</td><td>User@example.com<br>
                        </tbody>
                    </table>
                </div>
            </section>
            <div class="text-center">
                <a class="btn btn-primary" href="{{ url('/user_modify') }}" role="button">修正/退会する</a>
            </div>

        </main>

    </div>

@endsection