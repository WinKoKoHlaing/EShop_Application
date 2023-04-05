@section('title','Product Create Form')
    
@extends('backend.layouts.backend_master')
@section('content')
   <div class="col-md-12">
      <div class="card">
         <div class="card-body">
            <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
               @csrf

               <div class="form-group">
                  <label>Category</label>
                  <select class="form-control" name="category_id">
                     <option>Select a Category</option>
                     @foreach ($category as $c)
                        <option value="{{ $c->id }}">{{ $c->name }}</option>
                     @endforeach
                  </select>
               </div>               
               <div class="row d-flex">
                  <div class="form-group col-md-6">
                     <label>Name</label>
                     <input type="text" name="name" class="form-control">
                  </div>
                  <div class="form-group col-md-6">
                     <label>Slug</label>
                     <input type="text" name="slug" class="form-control">
                  </div>
               </div>
               <div class="form-group">
                  <label>Small Description</label>
                  <textarea name="small_description" class="form-control"></textarea>
               </div>
               <div class="form-group">
                  <label>Description</label>
                  <textarea name="description" class="form-control"></textarea>
               </div>
               <div class="row d-flex">
                  <div class="form-group col-md-6">
                     <label>Original Price</label>
                     <input type="number" name="original_price" class="form-control">
                  </div>
                  <div class="form-group col-md-6">
                     <label>Selling Price</label>
                     <input type="number" name="selling_price" class="form-control">
                  </div>
               </div>
               <div class="row d-flex">
                  <div class="form-group col-md-6">
                     <label>Tax</label>
                     <input type="number" name="tax" class="form-control">
                  </div>
                  <div class="form-group col-md-6">
                     <label>Quantity</label>
                     <input type="number" name="qty" class="form-control">
                  </div>
               </div>
               <div class="row d-flex">
                  <div class="col-md-6">
                     <div class="form-group">
                        <label>Status</label>
                        <input type="checkbox" name="status">
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <label>Trending</label>
                        <input type="checkbox" name="trending">
                     </div>
                  </div>
               </div>
               <div class="row d-flex">
                  <div class="form-group col-md-6">
                     <label>Meta Title</label>
                     <input type="text" name="meta_title" class="form-control" >
                  </div>
                  <div class="form-group col-md-6">
                     <label>Meat Keywords</label>
                     <input type="text" name="meta_keywords" class="form-control" >
                  </div>
               </div>
               <div class="form-group">
                  <label>Meta Description</label>
                  <textarea name="meta_description" class="form-control"></textarea>
               </div>
               <div class="form-group">
                  <label>Image</label>
                  <input type="file" name="image" class="form-control-file" >
               </div>
               <div class="d-flex justify-content-center">
                  <button class="btn btn-primary mr-2" type="submit">
                     <i class="fa fa-fw fa-lg fa-check-circle"></i>
                     Submit
                  </button>
                  <button class="btn btn-secondary">
                     <i class="fa fa-fw fa-lg fa-times-circle"></i>
                     Cancel
                  </button>
               </div>
            </form>
         </div>
      </div>
   </div>  
@endsection
