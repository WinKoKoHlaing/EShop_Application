@section('title','Home page')
@extends('frontend.layouts.frontend_master')

@section('content')
@include('frontend.layouts.slider')
   <div class="container mt-4">
      <div class="row py-3">       
         <h3>Featured Products</h3>
         <div class="owl-carousel featured-carousel owl-theme">
            @foreach ($trending_product as $product)
               <div class="item">
                  @foreach ($popular_category as $category)
                  <a href="{{ url('category/'.$category->slug.'/'.$product->slug) }}">           
                  @endforeach
                     <div class="card">
                        <img src="{{ asset('assets/uploads/product/'.$product->image) }}" alt="Title">
                        <div class="card-body">
                           <h5>{{ $product->name }}</h5>
                           <span class="float-start">{{ $product->original_price }}</span>
                           <span class="float-end"><s>{{ $product->selling_price }}</s></span>
                        </div>
                     </div>
                  </a>
               </div>
            @endforeach
         </div>
      </div>
      <div class="row py-3">       
         <h3>Popular Categories</h3>
         <div class="owl-carousel featured-carousel owl-theme">
            @foreach ($popular_category as $category)
               <div class="item">
                  <a href="{{ url('category/'.$category->slug) }}">
                     <div class="card">
                        <img src="{{ asset('assets/uploads/category/'.$category->image) }}" alt="Title">
                        <div class="card-body">
                           <h5>{{ $category->name }}</h5>
                           <span class="float-start">{{ $category->original_price }}</span>
                           <span class="float-end"><s>{{ $category->selling_price }}</s></span>
                        </div>
                     </div>
                  </a>
               </div>
            @endforeach
         </div>
      </div>
   </div>
@endsection
@section('scripts')
<script>
   $('.featured-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    dots:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
})
</script>
@endsection