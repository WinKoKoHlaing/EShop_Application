@section('title','Product List')

@extends('backend.layouts.backend_master')
@section('content')
   <div class="col-md-12">
      <a href="{{ route('product.create') }}" class="btn btn-success">
         <i class="fa fa-fw fa-lg fa-plus-circle"></i>
         Add Product
      </a>
      <div class="card">
         <div class="card-body">
            <table class="table table-striped">
               <thead>
                  <tr>
                     <th>id</th>
                     <th>category</th>
                     <th>name</th>
                     <th>selling price</th>
                     <th>image</th>
                     <th>action</th>
                  </tr>
               </thead>
               <tbody>
                  @foreach ($product as $p)
                      <tr>
                        <td>{{ $p->id }}</td>
                        <td>{{ $p->category->name }}</td>
                        <td>{{ $p->name }}</td>
                        <td>{{ $p->selling_price }}</td>
                        <td>
                           <img src="{{ asset('assets/uploads/product/'.$p->image) }}" width="100">
                        </td>
                        <td>
                           <div class="d-flex">
                              <form method="post" action="{{route('product.destroy',$p->id)}}" onsubmit="return confirm('Are you sure?')" class="d-inline-block">
                                 @csrf
                                 @method('DELETE')
                                 <a href="{{ route('product.edit',$p->id) }}" class="btn btn-sm btn-warning">
                                    <i class="fa fa-edit"></i> Edit
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

