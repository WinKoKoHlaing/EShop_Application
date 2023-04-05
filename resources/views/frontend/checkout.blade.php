@section('title','Checkout-Page')
@extends('frontend.layouts.frontend_master')
@section('content')
    <div class="container mt-4">
      <form action="{{ url('place-order') }}" method="POST">
         @csrf
         @method('POST')
         <div class="row">
            <div class="col-md-7">
               <div class="card shadow">
                  <div class="card-body">
                     <h5>Basic Details</h5>
                     <hr>
                     <div class="row">
                        <div class="col-md-6 mt-3">
                           <label>First Name</label>
                           <input type="text" name="fname" value="{{ Auth::user()->name }}" class="form-control" placeholder="Enter first name">
                        </div>
                        <div class="col-md-6 mt-3">
                           <label>Last Name</label>
                           <input type="text" name="lname" value="{{ Auth::user()->lname }}"  class="form-control" placeholder="Enter first name">
                        </div>
                        <div class="col-md-6 mt-3">
                           <label>Email</label>
                           <input type="text" name="email" value="{{ Auth::user()->email }}" class="form-control" placeholder="Enter email">
                        </div>
                        <div class="col-md-6 mt-3">
                           <label>Phone</label>
                           <input type="number" name="phone" value="{{ Auth::user()->phone }}" class="form-control" placeholder="Enter phone number">
                        </div>
                        <div class="col-md-6 mt-3">
                           <label>Address 1</label>
                           <input type="text" name="address1" value="{{ Auth::user()->address1 }}" class="form-control" placeholder="Enter address one">
                        </div>
                        <div class="col-md-6 mt-3">
                           <label>Address 2</label>
                           <input type="text" name="address2" value="{{ Auth::user()->address2 }}" class="form-control" placeholder="Enter address two">
                        </div>
                        <div class="col-md-6 mt-3">
                           <label>City</label>
                           <input type="text" name="city" value="{{ Auth::user()->city }}" class="form-control" placeholder="Enter your city">
                        </div>
                        <div class="col-md-6 mt-3">
                           <label>State</label>
                           <input type="text" name="state" value="{{ Auth::user()->state }}" class="form-control" placeholder="Enter your state">
                        </div>
                        <div class="col-md-6 mt-3">
                           <label>Country</label>
                           <input type="text" name="country" value="{{ Auth::user()->country }}" class="form-control" placeholder="Enter your country">
                        </div>
                        <div class="col-md-6 mt-3">
                           <label>Pincode</label>
                           <input type="text" name="pincode" value="{{ Auth::user()->pincode }}" class="form-control" placeholder="Enter pincode">
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-5">
               <div class="card shadow">
                  <div class="card-body">
                     <h5>Order Details</h5>
                     <hr>
                     @if ($cartItems->count() > 0)
                        <table class="table table-striped table-bordered">
                           <thead>
                              <tr>
                                 <th>Name</th>
                                 <th>Qty</th>
                                 <th>Price</th>
                              </tr>
                           </thead>
                           <tbody>
                              @php $total_price = 0 @endphp
                              @foreach ($cartItems as $cart)
                                 <tr>
                                    <td>{{ $cart->products->name }}</td>
                                    <td>{{ $cart->product_qty }}</td>
                                    <td>{{ $cart->products->selling_price }}</td>
                                 </tr>            
                                 @php $total_price += $cart->products->selling_price * $cart->product_qty @endphp            
                              @endforeach
                           </tbody>
                           <tfoot>
                              <tr>
                                 <td>Total Price : {{ $total_price }} MMK</td>
                              </tr>
                           </tfoot>
                        </table>
                        <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary">Place Order</button>
                        </div>
                     @else
                        <h4 class="text-center">There is no <i class="fas fa-shopping-cart"></i> cart item.</h4>
                     @endif
                  </div>
               </div>
            </div>
         </div>
      </form>
    </div>
@endsection
