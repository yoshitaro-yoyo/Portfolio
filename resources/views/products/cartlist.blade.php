@extends('layouts.app')

@section('content')

    <main>

        <div class="container">
            <div class="row">
                <div class="col-12 card border-dark mt-5">
                    <div class="cord-body ml-3 mb-2">
                        <h4 class="mt-4">お届け先</h4>
                        <p class="mb-2" style="padding-left: 20px;">
                            〒
                            {{$sesUsers->zipcode}}
                            {{$sesUsers->prefecture}}
                            {{$sesUsers->municipality}}
                            {{$sesUsers->address}}
                            {{$sesUsers->apartments}}
                        </p>
                        <p style="padding-left: 160px;">
                            {{$sesUsers->last_name}}
                            {{$sesUsers->first_name}}
                            様
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <table class="table mt-5 ml-3 border-dark">
                    <thead>
                        <tr class="text-center">
                            <th class="border-bottom border-dark" style="width:13%;">No</th>
                            <th class="border-bottom border-dark" style="width:18%;">商品名</th>
                            <th class="border-bottom border-dark" style="width:15%;">商品カテゴリ</th>
                            <th class="border-bottom border-dark" style="width:15%;">値段</th>
                            <th class="border-bottom border-dark" style="width:15%;">個数</th>
                            <th class="border-bottom border-dark" style="width:15%;">小計</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sesData as $sesDatum)
                            <tr class="text-center">
                                <th class="align-middle">1</th>
                                <td class="align-middle">
                                    @if(isset($sesDatum->product_name))
                                        {{ $sesDatum->product_name }}
                                    @endif
                                </td>
                                <td class="align-middle">
                                    @if(isset($sesDatum->category_name))
                                        {{ $sesDatum->category_name }}
                                    @endif
                                </td>
                                <td class="align-middle">
                                    @if(isset($sesDatum->price))
                                        {{ $sesDatum->price }}
                                    @endif
                                </td>
                                <td class="align-middle">
                                    <button type="button" class="btn btn-outline-dark">
                                        @if(isset($sesDatum->sesQty))
                                            {{ $sesDatum->sesQty }}
                                        @endif
                                    </button>
                                    &nbsp;&nbsp;個
                                </td>
                                <td class="align-middle"></td>
                                <td class="border-0 align-middle">
                                    <a class="btn btn-danger" href="#" role="button">
                                        削除
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        <tr class="text-center">
                            <th class="border-top-0 border-bottom border-dark align-middle"></th>
                            <td class="border-top-0 border-bottom border-dark align-middle"></td>
                            <td class="border-top-0 border-bottom border-dark align-middle"></td>
                            <td class="border-top-0 border-bottom border-dark align-middle"></td>
                            <td class="border-top-0 border-bottom border-dark align-middle"></td>
                            <td class="border-top-0 border-bottom border-dark align-middle"></td>
                        </tr>
                        <tr class="text-center">
                            <th class="border-bottom-0 align-middle"></th>
                            <td class="border-bottom-0 align-middle"></td>
                            <td class="border-bottom-0 align-middle"></td>
                            <td class="border-bottom-0 align-middle"></td>
                            <td class="border-bottom-0 align-middle">合計</td>
                            <td class="border-bottom-0 align-middle">円</td>
                        </tr>
                        <tr class="text-right">
                            <th class="border-0"></th>
                            <td class="border-0">
                                <a class="btn btn-success" href="#" role="button">
                                    買い物を続ける
                                </a>
                            </td>
                            <td class="border-0"></td>
                            <td class="border-0"></td>
                            <td class="border-0">
                                <a class="btn btn-primary"  href="#" role="button">
                                    注文を確定する
                                </a>
                            </td>
                            <td class="border-0 align-middle"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </main>

@endsection