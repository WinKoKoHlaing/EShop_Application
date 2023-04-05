@section('title','My-Cart-Page')
@extends('frontend.layouts.frontend_master')
@section('content')

<div class="bg-warning py-2 shadow-sm border-top">
   <div class="container">
      <div class="d-flex">
         <a href="#">Home / </a>
         <a href="{{ url('/cart') }}" class="mx-2">Cart / </a>
      </div>
   </div>
</div>

<div class="container my-3 cart_data">
   @if ($cartItems->count() > 0)
   <div class="card shadow">
      <div class="card-body">
            <h5>Cart Items</h5>
            @php $total_price = 0; @endphp
            @foreach ($cartItems as $cart)
               <hr>
               <div class="row d-flex align-items-center product_data">
                  <div class="col-2">
                     <img src="{{ asset('assets/uploads/product/'.$cart->products->image) }}" alt="" class="img-fluid" width="100">
                  </div>
                  <div class="col-4">
                     {{ $cart->products->name }}
                     <input type="text" class="product_id" value="{{ $cart->product_id }}">
                  </div>
                  <div class="col-2">
                     {{$cart->products->selling_price }} MMK
                  </div>
                  <div class="col-2">
                     @if ($cart->products->qty >= $cart->product_qty)
                        <label>Quantity</label>
                        <div class="input-group text-center mb-3" style="width:130px;">
                           <button class="input-group-text qty_decrement changeQuantity">-</button>
                           <input type="text" name="quantity" value="{{ $cart->product_qty }}" class="form-control qty_input text-center">
                           <button class="input-group-text qty_increment changeQuantity">+</button>
                        </div>
                        @php $total_price += $cart->products->selling_price * $cart->product_qty; @endphp
                     @else
                        <label>Out of Stock</label>
                     @endif
                  </div>
                  <div class="col-2">
                     <button class="btn btn-sm btn-danger cart-item-remove"><i class="fa fa-trash"></i> remove</button>
                  </div>
               </div>
            @endforeach
         </div>
         <div class="card-footer">
            <h5 class="float-start">Total price : {{$total_price }} MMK</h5>
            <a href="{{ url('checkout') }}" class="btn btn-outline-dark float-end checkout">Proceed to Checkout</a>
         </div>
      </div>
   @else
      <div class="card shadow">
         <div class="card-body text-center py-3">
            <h4>Your <i class="fas fa-shopping-cart"></i> Cart is Empty.</h4>
            <a href="{{ url('category') }}" class="btn btn-outline-dark float-end checkout">Continue Shopping</a>
         </div>
      </div>
   @endif
</div>
@endsection
