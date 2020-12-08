@extends('layouts.app')

@section('content')

    <main>
        <form>
            <h2 class="text-center mt-5">ユーザ情報修正</h2>
            <table width="50%" style="margin-left:450px">
                <tr height="40">
                    <td align="center">氏名<span style="float: right">姓</span></td><td><input type="text" style="margin-left:10px" maxlength="10" required><span style="margin-right:35px"></span>名<input type="text" style="margin-left:10px" maxlength="10" required></td>
                </tr>
                <tr height="40">
                    <td align="center">住所<span style="float: right">〒</span></td><td colspan="2"><input type="text" style="margin-left:10px" size="25" pattern="\d{3}-?\d{4}" required></td>
                </tr>
                <tr height="40">
                    <td align="right">都道府県</td><td colspan="2"><input type="text" style="margin-left:10px" size="50" maxlength="5" required></td>
                </tr>
                <tr height="40">
                    <td align="right">市町村区</td><td colspan="2"><input type="text" style="margin-left:10px" size="50" maxlength="10" required></td>
                </tr>
                <tr height="40">
                    <td align="right">番地</td><td colspan="2"><input type="text" style="margin-left:10px" size="50" maxlength="15" required></td>
                </tr>
                <tr height="40">
                    <td align="right">マンション<br>部屋番号</br></td><td colspan="2"><input type="text" style="margin-left:10px" size="50" maxlength="20" required></td>
                </tr>
                <tr height="40">
                    <td align="center">メールアドレス</td><td colspan="2"><input type="email" style="margin-left:10px" size="65"></td>
                </tr>
                <tr height="40">
                    <td align="center">電話番号</td><td colspan="2"><input type="text" style="margin-left:10px" size="65" pattern="(^[0-9]+$){1,15}" required></td>
                </tr>
            </table>
            <div class="row mt-5">
                <div class="col-5">
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-primary" type="submit">修正</button>
                    </div>
                </div>
                <div class="col-5 offset-2">
                    <button class="btn btn-danger" type="submit">退会</button>
                </div>
            </div>
        </form>
    </main>

@endsection