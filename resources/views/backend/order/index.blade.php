@section('title','Order Lists')
@section('title-icon','fa-chart-line')
    
@extends('backend.layouts.backend_master')
@section('content')
   <div class="col-md-12">
      <a href="{{ route('order-history') }}" class="btn btn-md btn-danger">Order History</a>
      <div class="card">
         <div class="card-body">
            <div class="card">
               <table class="table table-striped table-bordered">
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
                     @foreach ($orders as $order)
                        <tr>
                           <td>{{ date('d:m:Y',strtotime($order->created_at)) }}</td>
                           <td>{{ $order->tracking_no }}</td>
                           <td>{{ $order->total_price }}</td>
                           <td>
                              {{-- @if ($order->status == '0')
                                    <p class="badge bg-danger text-white">pending</p>
                              @elseif($order->status > 0)
                              <p class="badge bg-success text-white">completed</p>
                              @endif --}}
                              <p class="badge bg-danger text-white">pending</p>
                           </td>
                           <td>
                              <a href="{{ route('order-view',$order->id) }}" class="btn btn-sm btn-dark"><i class="fas fa-eye"></i> view</a>
                           </td>
                        </tr>                         
                     @endforeach
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
@endsection