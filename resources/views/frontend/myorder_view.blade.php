@section('title','My-Order-Detail')
    
@extends('frontend.layouts.frontend_master')
@section('content')
    <div class="container mt-4 mb-4">
      <div class="card shadow">
         <div class="card-header bg-primary text-white">
            <h5 class="float-start">Order View</h5>
            <a href="{{ url('my-order') }}" class="btn btn-sm btn-dark float-end">Back</a>
         </div>
         <div class="card-body">
            <div class="row">
               <div class="col-md-6">
                  <div class="card">
                     <div class="card-header">
                        <h5>Shopping Details</h5>
                     </div>
                     <div class="card-body">
                        <form action="">
                           <label>First Name</label>
                           <input type="text" class="form-control" name="fname" value="{{ $order->fname }}">
                           <label>Last Name</label>
                           <input type="text" class="form-control" name="lname" value="{{ $order->lname }}">
                           <label>Email</label>
                           <input type="text" class="form-control" name="email" value="{{ $order->email }}">
                           <label>Phone</label>
                           <input type="text" class="form-control" name="phone" value="{{ $order->phone }}">
                           <label>Address</label>
                           <textarea rows="5"  class="form-control text-left" name="">
                              {{ $order->address1 }}
                              {{ $order->address2 }}
                              {{ $order->city }}
                              {{ $order->state }}
                              {{ $order->country }}
                           </textarea>
                           <label>Zip Code</label>
                           <input type="text" class="form-control" name="zipcode" value="{{ $order->pincode }}">
                        </form>
                     </div>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="card">
                     <div class="card-header">
                        <h5>Order Details</h5>
                     </div>
                     <div class="card-body">
                        <table class="table table-bordered">
                           <thead>
                              <tr>
                                 <th>Name</th>
                                 <th>Quantity</th>
                                 <th>Price</th>
                                 <th>Image</th>
                              </tr>
                           </thead>
                           <tbody>
                              @foreach ($order->orderItems as $orderItem)
                                 <tr>
                                    <td>{{ $orderItem->products->name }}</td>
                                    <td>{{ $orderItem->qty }}</td>
                                    <td>{{ $orderItem->price }}</td>
                                    <td>
                                       <img src="{{ asset('assets/uploads/product/'.$orderItem->products->image) }}" width="70px">
                                    </td>
                                 </tr>
                              @endforeach
                           </tbody>
                        </table>
                     </div>
                     <div class="card-footer">
                        <h5>Total Price : <span class="float-end">{{ $order->total_price }} MMK</span></h5>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
    </div>
@endsection