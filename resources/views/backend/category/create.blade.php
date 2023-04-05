@section('title','Category Create Form')
   
@extends('backend.layouts.backend_master')
@section('content')
<div class="col-12">
   <div class="card p-4">
      <div class="card-body">
         <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
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
               <label>Description</label>
               <textarea name="description" class="form-control"></textarea>
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
                     <label>Popular</label>
                     <input type="checkbox" name="popular">
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
               <label>Image</label>
               <input type="file" name="image" class="form-control-file" >
            </div>
            <div class="form-group">
               <label>Meta Description</label>
               <textarea name="meta_description" class="form-control"></textarea>
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