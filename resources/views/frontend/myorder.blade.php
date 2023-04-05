@section('title','My-Order-Page')
    
@extends('frontend.layouts.frontend_master')
@section('content')
   <div class="container mt-4">
      <div class="card-header bg-primary text-white">
         <h5>My Order</h5>
      </div>
      <div class="card shadow p-3">
         <div class="card-body">
            <table class="table table-striped table-bordered">
               <thead>
                  <tr>
                     <th>Tracking Number</th>
                     <th>Total Price</th>
                     <th>Status</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody>
                  @foreach ($orders as $order)
                  <tr>
                     <td>{{ $order->tracking_no }}</td>
                     <td>{{ $order->total_price }}</td>
                     <td>
                        @if ($order->status == '0' )
                        <p class="badge bg-primary">Pending</p>                            
                        @elseif($order->status > '0')
                        <p class="badge bg-success">Completed</p>
                        @endif
                     </td>
                     <td>
                        <a href="{{ url('my-order/'.$order->id)}}" class="btn btn-dark">View</a>
                     </td>
                  </tr>
                  @endforeach
               </tbody>
            </table>
         </div>
      </div>
   </div>
@endsection