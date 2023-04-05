@section('title','Order View')
@section('title-icon','fa-chart-line')
    
@extends('backend.layouts.backend_master')
@section('content')
   <div class="col-md-12">
      <a href="{{ route('order') }}" class="btn btn-md btn-dark">Back</a>
      <div class="card">
         <div class="card-body">
            <div class="row">
               <div class="col-md-6">
                  <div class="card">
                     <div class="card-header">
                        <h5>Personal Details</h5>
                     </div>
                     <div class="card-body">
                        <form action="" method="POST">
                           <label class="mt-2">First Name</label>
                           <input type="text" name="fname" value="{{ $orders->fname }}" class="form-control">
                           <label class="mt-2">Last Name</label>
                           <input type="text" name="lname" value="{{ $orders->lname }}" class="form-control">
                           <label class="mt-2">Phone</label>
                           <input type="text" name="phone" value="{{ $orders->phone }}" class="form-control">
                           <label class="mt-2">Email</label>
                           <input type="text" name="email" value="{{ $orders->email }}" class="form-control">
                           <label class="mt-2">Address</label>
                           <textarea name="address" id="" cols="30" rows="6" class="form-control">
                              {{ $orders->address1 }}
                              {{ $orders->address2 }}
                              {{ $orders->city }}
                              {{ $orders->state }}
                              {{ $orders->country }}
                           </textarea>
                           <label class="mt-2">Zip Code</label>
                           <input type="text" name="pincode" value="{{ $orders->pincode }}" class="form-control">
                        </form>
                     </div>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="card">
                     <div class="card-header">
                        <h5>Item Details</h5>
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
                              @foreach ($orders->orderItems as $orderItem)
                                  <tr>
                                    <td>{{ $orderItem->products->name }}</td>
                                    <td>{{ $orderItem->qty }}</td>
                                    <td>{{ $orderItem->price }}</td>
                                    <td>
                                       <img src="{{ asset('assets/uploads/product/'.$orderItem->products->image) }}" width="50">
                                    </td>
                                  </tr>
                              @endforeach
                           </tbody>
                        </table>
                     </div>
                     <div class="card-footer d-flex justify-content-between">
                        <h5>Total Price : </h5>
                        <h5>{{ $orders->total_price }} MMK</h5>
                     </div>
                  </div>
                  <div class="card mt-3">
                     <div class="card-body">
                        <div class="form-group">
                          <label class="h5">Order Status</label>
                           <form action="{{ route('order-update',$orders->id) }}" method="POST">
                           @csrf
                           @method('PUT')
                            <select class="form-control" name="order_status">
                              <option value="0" @if ($orders->status == '0') selected @endif>pending</option>
                              <option value="1" @if ($orders->status == '1') selected @endif>completed</option>
                            </select>
                            <button class="btn btn-md btn-dark float-right mt-2" type="submit">Update</button>
                          </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection