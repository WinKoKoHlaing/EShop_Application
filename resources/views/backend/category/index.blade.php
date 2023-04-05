@section('title','Category')
    
@extends('backend.layouts.backend_master')
@section('content')
    <div class="col-md-12">
      <a href="{{ route('category.create') }}" class="btn btn-success">
         <i class="fa fa-fw fa-lg fa-plus-circle"></i>
         Add Category
      </a>
      <div class="card">
         <div class="card-body">
            <table class="table table-striped">
               <thead>
                  <tr>
                     <th>Name</th>
                     <th>Slug</th>
                     <th>Description</th>
                     <th>Image</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody>
                  @foreach ($category as $c)
                  <tr>
                     <td>{{ $c->name }}</td>
                     <td>{{ $c->slug }}</td>
                     <td>{{ $c->description }}</td>
                     <td>
                        <img src="{{ asset('assets/uploads/category/'.$c->image) }}" width="100">
                     </td>
                     <td>                        
                        <div class="d-flex">
                           <form method="post" action="{{route('category.destroy',$c->id)}}" onsubmit="return confirm('Are you sure?')" class="d-inline-block">
                              @csrf
                              @method('DELETE')
                              <a href="{{ route('category.edit',$c->id) }}" class="btn btn-sm btn-warning mr-2">
                                 <i class="fa fa-edit"></i>Edit
                              </a>
                              <button type="submit" class="btn btn-sm  btn-danger">
                                 <i class="fa fa-trash"></i>Delete
                              </button>
                           </form>
                        </div>
                     </td>
                  </tr>
                  @endforeach
               </tbody>
            </table>
         </div>
      </div>
    </div>
@endsection
