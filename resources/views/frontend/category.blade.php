@section('title','Category Page')
    
@extends('frontend.layouts.frontend_master')
@section('content')
   <div class="container mt-5">
      <h4>All Categories</h4>
      <div class="row">
         @foreach ($categories as $category)
            <div class="col-md-3 pt-2">
               <a href="{{ url('category/'.$category->slug) }}">
                  <div class="card">
                     <img src="{{ asset('assets/uploads/category/'.$category->image) }}" alt="">
                     <div class="card-body">
                        <p>{{ $category->name }}</p>
                        <p>{{ $category->description }}</p>
                     </div>
                  </div>
               </a>
            </div>
         @endforeach
      </div>
   </div>
@endsection