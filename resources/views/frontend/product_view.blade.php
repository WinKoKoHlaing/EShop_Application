@section('title','Product-View-Page')
@extends('frontend.layouts.frontend_master')
@section('content')

   <div class="bg-warning py-2 shadow-sm border-top">
      <div class="container">
         <div class="d-flex">
            <a href="{{ url('category') }}">Collections / </a>
            <a href="{{ url('category/'.$product->category->slug) }}" class="mx-2">{{ $product->category->name }} / </a>
            <a href="#">{{ $product->name }}</a>
         </div>
      </div>
   </div>
   <div class="container mt-3">
      <div class="card shadow product_data">
         <div class="card-body">
            <div class="row">
               <div class="col-md-4">
                  <img src="{{ asset('assets/uploads/product/'.$product->image) }}" alt="" class="img-fluid">
               </div>
               <div class="col-md-8">
                  <h2>
                     {{ $product->name }}
                     @if ($product->trending === 1)                         
                     <label style="font-size:11px;" class="float-end badge bg-info">Trending</label>
                     @endif
                  </h2>
                  <hr>
                  <label for="" class="me-3">original price : <s>{{ $product->original_price }}$</s></label>
                  <label for="" class="fw-bold">selling price : {{ $product->selling_price }}$</label>
                  <p class="mt-3">
                     {{ $product->description }}
                  </p>
                  <hr>
                  @if ($product->qty > 0)
                  <label for="" class="badge bg-success">In stock</label>
                  @else                      
                  <label for="" class="badge bg-danger">Out of stock</label>
                  @endif
                  <!-- product_id -->
                  <input type="text" value="{{ $product->id }}" class="product_id">
                  <div class="row mt-3">
                     <div class="col-md-2">
                        <label for="">Quantity</label>
                        <div class="input-group text-center mb-3">
                           <button class="input-group-text qty_decrement">-</button>
                           <input type="text" name="quantity" value="1" class="form-control qty_input">
                           <button class="input-group-text qty_increment">+</button>
                        </div>
                     </div>
                     <div class="col-md-10 mt-4">                        
                        @if ($product->qty > 0)
                           <button class="btn btn-primary addToCartBtn">
                              Add to cart
                              <i class="fas fa-shopping-cart"></i>
                           </button>
                        @endif
                        <button class="btn btn-success me-3 addToWishlistBtn">
                           Add to Whitelist
                           <i class="fas fa-heart"></i> 
                        </button>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>   
@endsection
