@section('title','Wishlist-Page')
@extends('frontend.layouts.frontend_master')
@section('content')
    <div class="container mt-4">
      @if ($wishlists->count() > 0)
         <div class="card shadow product_data">
            <div class="card-body">
               <h5>Wishlist Items</h5>
               @foreach ($wishlists as $wishlist)
                  <hr>
                  <div class="row d-flex align-items-center product_data">
                     <div class="col-2">
                        <img src="{{ asset('assets/uploads/product/'.$wishlist->products->image) }}" width="100" class="img-fluid">
                     </div>
                     <div class="col-3">
                        {{ $wishlist->products->name }}
                        <input type="text" value="{{ $wishlist->product_id }}" class="product_id">
                     </div>
                     <div class="col-2">
                        {{ $wishlist->products->selling_price }} MMK
                     </div>
                     <div class="col-2">
                        @if ($wishlist->products->qty > 0)
                           <label>Quantity</label>
                           <div class="input-group text-center mb-3" style="width:130px;">
                              <button class="input-group-text qty_decrement">-</button>
                              <input type="text" name="quantity" value="1" class="form-control qty_input text-center">
                              <button class="input-group-text qty_increment">+</button>
                           </div>
                           {{-- In Stock --}}
                        @else
                           <label>Out of Stock</label>
                        @endif
                     </div>
                     <div class="col-3">
                        @if ($wishlist->products->qty > 0)
                           <button class="btn btn-sm btn-success addToCartBtn">
                              <i class="fas fa-shopping-cart"></i> add to cart
                           </button>
                        @else
                           <button class="btn btn-sm btn-warning">
                              out of stock
                           </button>
                        @endif
                        <div class="btn btn-sm btn-danger wishlist-item-remove">
                           <i class="fas fa-trash"></i> remove
                        </div>
                     </div>
                  </div>
               @endforeach
            </div>
            <div class="card-footer">
               
            </div>
         </div>
      @else
         <div class="card">
            <div class="card-body text-center p-5">
               <h4>Your <i class="fas fa-heart"></i> Wishlist is Empty !</h4>
               <a href="{{ url('category') }}" class="btn btn-outline-dark mt-3">Continue Shopping</a>
            </div>
         </div>
      @endif
    </div>
@endsection