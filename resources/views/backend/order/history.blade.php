@section('title','Order-History')
@section('title-icon','fa-chart-line')

@extends('backend.layouts.backend_master')
@section('content')
   <div class="col-md-12">
      <a href="{{ route('order') }}" class="btn btn-md btn-dark">New Order</a>
      <div class="card">
         <div class="card-body">
            <table class="table table-bordered">
               <thead>
                  <tr>
                     <th>Order Date</th>
                     <th>Tracking Number</th>
                     <th>Total Price</th>
                     <th>Status</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody>
                  @foreach ($complete_orders as $complete_order)
                      <tr>
                        <td>{{ date('d:m:Y'),strtotime($complete_order->created_at) }}</td>
                        <td>{{ $complete_order->tracking_no }}</td>
                        <td>{{ $complete_order->total_price }}</td>
                        <td>
                           @if ($complete_order->status == '0')
                              <div class="badge bg-dark">pending</div>
                           @elseif($complete_order->status == '1')
                              <div class="badge bg-success">completed</div>
                           @endif
                        </td>
                        <td>
                           <a href="{{ route('order-view',$complete_order->id) }}" class="btn btn-sm btn-dark"><i class="fas fa-eye"></i> view</a>
                        </td>
                      </tr>
                  @endforeach
               </tbody>
            </table>
         </div>
      </div>
   </div>
@endsection