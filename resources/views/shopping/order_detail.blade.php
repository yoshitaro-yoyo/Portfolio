@extends('layouts.app')

@section('content')
    @if($logInUser == $user)
        <div class="container">
            <div class="jumbotron bg-white">
                <div class="card border-dark">
                    <div class="cord-body ml-3">
                        <h4 class="mt-4">お届け先</h4>
                        <p class="ml-3">{{ $user->zipcode }}　{{ $user->prefecture }}{{ $user->municipality }}{{ $user->address }}　{{ $user->apartments }}</p>
                        <div class="ml-4">
                            <p class="offset-sm-1">{{ $user->last_name }}　{{ $user->first_name }}　様</p>
                        </div>
                    </div>
                </div>
                <div class="mt-5 ml-3">
                    @php
                        $notReady = 0;
                        $orderDetails = $order->orderDetails();
                    @endphp
                    @if(isset($orderDetails))
                        @php
                            $notReady = 0;
                            $ready = 0;
                            $shipped = 0;
                            $cancel = 0;
                            $orderDetailCount = 0;
                            foreach( $order->orderDetails as $orderDetail ){
                                $shipmentStatusId = $orderDetail->shipment_status_id;
                                if($shipmentStatusId === 2){
                                    $ready += 1;
                                }elseif($shipmentStatusId === 3){
                                    $shipped += 1;
                                }elseif($shipmentStatusId === 4){
                                    $cancel += 1;
                                }
                            }
                            $orderDetailCount = $order->orderDetails()->count();
                        @endphp
                        <p>注文番号：{{ $order->order_number }}</p>
                        @if($orderDetailCount === $shipped)
                            @php
                                $notReady = 0;
                            @endphp
                            注文状態：発送済
                        @elseif($orderDetailCount === $ready)
                            @php
                                $notReady = 0;
                            @endphp
                            注文状態：発送準備完了 
                        @elseif($orderDetailCount === $cancel)
                            @php
                                $notReady = 0;
                            @endphp
                            注文状態：キャンセル
                        @else
                            @php
                                $notReady = 1;
                            @endphp
                            注文状態：準備中
                        @endif
                    @endif  
                </div>
                @if($notReady === 1)
                    <div class="text-right">
                        <a href="{{ action('OrderDetailsController@edit', $order->id) }}" class="btn btn-danger">注文をキャンセルする</a>
                    </div>
                @endif
                <table class="table table-borderless mt-3">
                    <thead>
                        <tr>
                            <th scope="col" class="border-top border-bottom">No</th>
                            <th scope="col" class="border-top border-bottom">商品名</th>
                            <th scope="col" class="border-top border-bottom">商品カテゴリ</th>
                            <th scope="col" class="border-top border-bottom">値段</th>
                            <th scope="col" class="border-top border-bottom">個数</th>
                            <th scope="col" class="border-top border-bottom">小計</th>
                            <th scope="col" class="border-top border-bottom">備考</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $orderDetailNumber = 0;
                            $total = 0;
                        @endphp
                        @foreach($order->orderDetails as $orderDetail)
                            <tr>
                                <th scope="row">{{ $orderDetailNumber += 1 }}</th>
                                    @php
                                        $productId = $orderDetail->product_id;
                                        $product = App\Product::find($productId); 
                                        $categoryId = $product->category_id;
                                        $category = App\Category::find($categoryId);
                                        $shipmentStatusId = $orderDetail->shipment_status_id;
                                        $shipmentStatus = App\ShipmentStatus::find($shipmentStatusId);
                                        $subTotal = 0;
                                        $price = $product->price;
                                        $quantity = $orderDetail->order_quantity;
                                        $subTotal = $price * $quantity;
                                    @endphp
                                <td>{{ $product->product_name }}</td>
                                <td>{{ $category->category_name }}</td>
                                <td>{{ $price }}円</td>
                                <td>{{ $quantity }} 個</td>
                                <td>{{ $subTotal }}円</td>
                                <td>注文状態：{{ $shipmentStatus->shipment_status_name }}</td>
                                @php
                                    $total += $subTotal;
                                @endphp
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="border-top border-dark">
                    <div  class="mt-2 offset-sm-7">
                        <p class="ml-4">合計　　　{{ $total }}円</p>
                    </div>
                </div>
                <div class="text-right mb-5">
                    <a href="{{ route('orders.index') }}" class="btn btn-info">注文履歴に戻る</a>
                </div>
            </div>           
        </div>
    @else
        <div class="container">
            <div class="jumbotron text-center bg-white">
                <h1>該当の注文は見つかりませんでした…</h1>
                <p class="mt-5">注文履歴画面に戻り、やり直してください</p>
                <a href="{{ route('orders.index') }}" class="btn btn-primary">注文履歴へ</a>
            </div>
        </div>
    @endif
@endsection