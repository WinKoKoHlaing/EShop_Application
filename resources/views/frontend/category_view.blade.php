@section('title','Category-View-Page')
@extends('frontend.layouts.frontend_master')
@section('content')
    <div class="container mt-5">
      <h4>{{ $category->name }}</h4>
      <div class="row">
         @foreach ($products as $product)
            <div class="col-md-3">
               <a href="{{ url('category/'.$category->slug.'/'.$product->slug) }}">
                  <div class="card">
                     <img src="{{ asset('assets/uploads/product/'.$product->image) }}" alt="">
                     <div class="card-body">
                        <h5>{{ $product->name }}</h5>
                        <p>{{ $product->original_price }}</p>
                     </div>
                  </div>
               </a>
            </div>
         @endforeach
      </div>
    </div>
@endsection