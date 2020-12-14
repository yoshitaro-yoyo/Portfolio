@extends('layouts.app')

@section('content')

    <main>
        <h2 class="text-center my-4">ユーザ情報修正</h2>
        {!! Form::open(['route' => ['method' => 'PUT', 'users.update', $user->id]]) !!}
            {{csrf_field()}}
            {{ method_field('PUT') }}
            <fieldset class="mb-4">
                <table width="50%" style="margin-left:350px">
                    <tr height="40">
                        <td align="center">氏名</td>
                        <td>
                            {!! Form::label('first_name', '姓') !!}
                            {!! Form::text('first_name', $user->first_name); !!}
                            
                                <span style="margin-right:35px"></span>名
                            <input
                                id="last_name"
                                name="last_name"
                                value="{{$user->last_name}}"
                                type="text"
                                style="margin-left:10px"
                                maxlength="10"
                                required placeholder="✕✕"
                            >
                        </td>
                    </tr>
                    <tr height="40">
                        <td align="center">住所<span style="float: right">〒</span></td>
                        <td colspan="2">
                            <input
                                id="zipcode"
                                name="zipcode"
                                value="{{$user->zipcode}}"
                                type="text"
                                style="margin-left:10px"
                                size="25"
                                pattern="\d{3}-?\d{4}"
                                required placeholder="〇〇〇〇〇〇〇"
                            >
                        </td>
                    </tr>
                    <tr height="40">
                        <td align="right">都道府県</td>
                        <td colspan="2">
                            <input
                                id="prefecture"
                                name="prefecture"
                                value="{{$user->prefecture}}"
                                type="text"
                                style="margin-left:10px"
                                size="50"
                                maxlength="5"
                                required placeholder="〇〇県"
                            >
                        </td>
                    </tr>
                    <tr height="40">
                        <td align="right">市町村区</td>
                        <td colspan="2">
                            <input
                                id="municipality"
                                name="municipality"
                                value="{{$user->municipality}}"
                                type="text"
                                style="margin-left:10px"
                                size="50"
                                maxlength="10"
                                required placeholder="〇〇市"
                            >
                        </td>
                    </tr>
                    <tr height="40">
                        <td align="right">番地</td>
                        <td colspan="2">
                            <input
                                id="address"
                                name="address"
                                value="{{$user->address}}"
                                type="text"
                                style="margin-left:10px"
                                size="50"
                                maxlength="15"
                                required placeholder="○○  ○-○-○"
                            >
                        </td>
                    </tr>
                    <tr height="40">
                        <td align="right">マンション<br>部屋番号</br></td>
                        <td colspan="2">
                            <input
                                id="apartments"
                                name="apartments"
                                value="{{$user->apartments}}"
                                type="text"
                                style="margin-left:10px"
                                size="50"
                                maxlength="20"
                                required
                            >
                        </td>
                    </tr>
                    <tr height="40">
                        <td align="center">メールアドレス</td>
                        <td colspan="2">
                            <input
                                id="email"
                                name="email"
                                value="{{$user->email}}"
                                type="email"
                                style="margin-left:10px"
                                size="65"
                                placeholder="User@example.com"
                            >
                        </td>
                    </tr>
                    <tr height="40">
                        <td align="center">電話番号</td>
                        <td colspan="2">
                            <input
                                id="phone_number"
                                name="phone_number"
                                value="{{$user->phone_number}}"
                                type="text"
                                style="margin-left:10px"
                                size="65"
                                pattern="(^[0-9]+$){1,15}"
                                required placeholder="〇〇〇〇〇〇〇〇〇〇〇"
                            >
                        </td>
                    </tr>
                </table>

                <div class="text-center mt-5">
                    <button class="btn btn-primary  w-25 mr-5" type="submit">修正</button>
                </div>
            </fieldset>
        {!! Form::close() !!}

        <div class="text-center mt-5">
            {!! Form::open(['route' => ['users.destroy', $user->id]]) !!}
                <fieldset>
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <button class="btn btn-danger  w-25 mr-5">退会</button>
                </fieldset>
            {!! Form::close() !!}
        </div>
    </main>

@endsection
<div class="row mt-5"></div>