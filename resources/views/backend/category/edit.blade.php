@section('title','Category Edit Form')

@extends('backend.layouts.backend_master')
@section('content')
<div class="col-12">
   <div class="card p-4">
      <div class="card-body">
         <form action="{{ route('category.update',$category->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row d-flex">
               <div class="form-group col-md-6">
                  <label>Name</label>
                  <input type="text" name="name" class="form-control" value="{{ $category->name }}">
               </div>
               <div class="form-group col-md-6">
                  <label>Slug</label>
                  <input type="text" name="slug" class="form-control" value="{{ $category->slug }}">
               </div>
            </div>
            <div class="form-group">
               <label>Description</label>
               <textarea name="description" class="form-control">{{ $category->description }}</textarea>
            </div>
            <div class="row d-flex">
               <div class="col-md-6">
                  <div class="form-group">
                     <label>Status</label>
                     <input type="checkbox" name="status" {{ $category->status == "1" ? 'checked' : '' }}>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <label>Popular</label>
                     <input type="checkbox" name="popular" {{ $category->popular == "1" ? 'checked' : ''}}>
                  </div>
               </div>
            </div>
            <div class="row d-flex">
               <div class="form-group col-md-6">
                  <label>Meta Title</label>
                  <input type="text" name="meta_title" class="form-control" value="{{ $category->meta_title }}">
               </div>
               <div class="form-group col-md-6">
                  <label>Meat Keywords</label>
                  <input type="text" name="meta_keywords" class="form-control" value="{{ $category->meta_keywords }}">
               </div>
            </div>
            <div class="form-group">
               <label>Image</label>
               <ul class="nav nav-tabs" id="myTab" role="tablist">
                  <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Old</a>
                  </li>
                  <li class="nav-item" role="presentation">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">New</a>
                  </li>
                </ul>
                <div class="tab-content my-2" id="myTabContent">
                  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <img src="{{asset('assets/uploads/category/'.$category->image)}}" width="200">
                  </div>
                  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <input type="file" name="image" class="form-control-file">
                  </div>
                </div>
            </div>
            <div class="form-group">
               <label>Meta Description</label>
               <textarea name="meta_description" class="form-control">{{ $category->meta_description }}</textarea>
            </div>
            <div class="d-flex justify-content-center">
               <button class="btn btn-primary mr-2" type="submit">
                  <i class="fa fa-fw fa-lg fa-check-circle"></i>
                  Update
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