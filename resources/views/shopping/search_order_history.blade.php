@extends('layouts.app')

@section('content')
<div class="container my-4">
    <a href="{{ route('orders.index') }}" class="btn btn-secondary btn-sm">全ての注文を表示</a>
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
            @foreach($recentlyOrders as $recentlyOrder)
                <tr>
                <th class="font-weight-normal" scope="row">{{ $orderNumber += 1 }}</th>
                    <td class="text-left">{{ $recentlyOrder->order_number }}</td>
                    <td class="text-left">
                        {{ $user->zipcode }}<br />{{ $user->prefecture }}{{ $user->municipality }}{{ $user->address }}　{{ $user->apartments }}<br />{{ $user->last_name }}　{{ $user->first_name }}　様
                    </td>
                    <td class="text-left">
                        注文日時：{{ $recentlyOrder->order_date }}<br/>
                        @php
                            $ready = 0;
                            $shipped = 0;
                            $cancel = 0;
                            $orderDetailCount = 0;
                            foreach( $recentlyOrder->orderDetails as $orderDetail ){
                                $shipmentStatusId = $orderDetail->shipment_status_id;
                                if($shipmentStatusId === 2){
                                    $ready += 1;
                                }elseif($shipmentStatusId === 3){
                                    $shipped += 1;
                                }elseif($shipmentStatusId === 4){
                                            $cancel += 1;
                                }
                            }
                            $orderDetailCount = $recentlyOrder->orderDetails()->count();
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
                        <a href="{{ action('OrderDetailsController@show', $recentlyOrder->id) }}" class="btn btn-primary btn-sm">詳細</a>
                    </td>
                </tr>     
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $recentlyOrders->links() }}
    </div>
</div>
@endsection 