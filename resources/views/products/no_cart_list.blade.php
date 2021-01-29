@extends('layouts.app')

@section('content')

    <main>

        <div class="container">
            <div class="row">
                <div class="col-12 card border-dark mt-5">
                    <div class="cord-body ml-3 mb-2">
                        <h4 class="mt-4">お届け先</h4>
                        <h4 class="mb-2" style="padding-left: 20px;">
                            〒
                            {{$user->zipcode}}
                            {{$user->prefecture}}
                            {{$user->municipality}}
                            {{$user->address}}
                            {{$user->apartments}}
                        </p>
                        <p style="padding-left: 160px;">
                            {{$user->last_name}}
                            {{$user->first_name}}
                            様
                        </h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="container my-5">
            <div class="text-center my-5">
                <h1>カートに商品はありません</h1>
            </div>
        </div>
    </main>

@endsection