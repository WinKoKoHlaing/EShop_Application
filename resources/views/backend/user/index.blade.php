@section('title','Users-Page')
@section('title-icon','fa-users')
    
@extends('backend.layouts.backend_master')
@section('content')
   <div class="col-md-12">
      <div class="card">
         <div class="card-body">
            <h5>Authenicated Users</h5>
            <table class="table table-bordered">
               <thead>
                  <tr>
                     <th>Id</th>
                     <th>Name</th>
                     <th>Email</th>
                     <th>Phone</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody>
                  @foreach ($users as $user)
                     <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>
                           <a href="{{ route('users-view',$user->id) }}" class="btn btn-sm btn-dark">
                              <i class="fas fa-eye"></i> view
                           </a>
                        </td>
                     </tr>
                  @endforeach
               </tbody>
            </table>
         </div>
      </div>
   </div>
@endsection