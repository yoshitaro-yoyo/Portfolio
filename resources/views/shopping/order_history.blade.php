@extends('layouts.app')

@section('content')
    @php
        foreach($orders as $order){
            $orderDetails = $order->orderDetails();
        }
    @endphp
    @if(isset($orderDetails))
        <div class="container my-4">
            <a href="{{ action('OrdersController@show', auth()->user()->id) }}" class="btn btn-secondary btn-sm">
                直近3ヶ月の注文を表示
            </a>
        </div>
        <div class="container">
            <table class="table">
                <thead class="table-sm h4">
                    <tr>
                        <th class="text-left" width="5%">No</th>
                        <th class="text-left" width="20%">注文番号</th>
                        <th class="text-left" width="40%">お届け先</th>
                        <th class="text-left" width="25%">備考</th>
                        <th class="text-left border-0" width="20%"></th>
                    </tr>
                </thead>
                <tbody class="h6 font-weight-normal">
                    @php
                        $orderNumber = 0;
                    @endphp
                    @foreach($orders as $order)
                        <tr>
                            <th class="font-weight-normal" scope="row">{{ $orderNumber += 1 }}</th>
                            <td class="text-left">{{ $order->order_number }}</td>
                            <td class="text-left">
                                〒
                                {{ auth()->user()->zipcode }}<br/>
                                {{ auth()->user()->prefecture }}
                                {{ auth()->user()->municipality }}
                                {{ auth()->user()->address }}
                                {{ auth()->user()->apartments }}<br/>
                                {{ auth()->user()->last_name }}
                                {{ auth()->user()->first_name }}
                                様
                            </td>
                            <td class="text-left">
                                注文日時：{{ $order->order_date }}<br/>
                                @php
                                    $ready = 0;
                                    $shipped = 0;
                                    $cancel = 0;
                                    $orderDetailCount = 0;
                                    foreach( $order->orderDetails as $orderDetail ) {
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
                                @if($orderDetailCount === $shipped)
                                    注文状態：発送済
                                @elseif($orderDetailCount === $ready)
                                    注文状態：発送準備完了
                                @elseif($orderDetailCount === $cancel)
                                    注文状態：キャンセル
                                @else
                                    注文状態：準備中
                                @endif
                            </td>
                            <td class="border-0 align-middle">
                                <a href="{{ action('OrderDetailsController@show', $order->id) }}" class="btn btn-primary btn-sm">
                                    詳細
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {{ $orders->links() }}
            </div>
        </div>
    @else
        <div class="blockquote mt-5 text-center">
            <h1 style="font-weight: bolder">注文履歴は存在しません</h1>
        </div>
    @endif
@endsection