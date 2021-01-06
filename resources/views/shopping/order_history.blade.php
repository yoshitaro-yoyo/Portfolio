@extends('layouts.app')

@section('content')

<div class="container my-4">
        <a href="#" class="btn btn-secondary py-0">直近3ヶ月の注文を表示</a>
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
          @foreach($user->orders as $order)
            @foreach($order->orderDetails as $orderDetail)
                
                  <tr>
                    <th class="font-weight-normal" scope="row">{{ $orderNumber += 1 }}</th>
                    <td class="text-left">{{ $orderDetail->order_detail_number }}</td>
                    <td class="text-left">
                    {{ $user->zipcode }}<br />{{ $user->prefecture }}{{ $user->municipality }}{{ $user->address }}　{{ $user->apartments }}<br />{{ $user->last_name }}　{{ $user->first_name }}　様
                    </td>
                    <td class="text-left">
                      注文日時：{{ $order->order_date }}<br />
                      @php
                        $shipmentStatusId = $orderDetail->shipment_status_id;
                        $shipmentStatus = App\ShipmentStatus::find($shipmentStatusId);
                      @endphp
                      注文状態：{{ $shipmentStatus->shipment_status_name }}
                      
                    </td>
                    <td class="border-0 align-middle">
                      <a href="#" class="btn btn-primary btn-sm">詳細</a>
                    </td>
                  </tr>
              
              @endforeach
          @endforeach
          </tbody>
        </table>
      </div>

      <div class="container">
        <nav aria-label="...">
          <ul class="pagination justify-content-center">
            <li class="page-item active">
              <a class="page-link" href="#"
                >1<span class="sr-only">(current)</span></a
              >
            </li>
          </ul>
        </nav>
      </div>

@endsection