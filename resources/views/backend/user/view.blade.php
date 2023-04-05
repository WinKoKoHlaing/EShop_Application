@section('title','Users-Details')
@section('title-icon','fa-users')
    
@extends('backend.layouts.backend_master')
@section('content')
   <div class="col-md-12">
      <a href="{{ route('users') }}" class="btn btn-md btn-dark mb-2">
         <i class="fas fa-angle-left"></i> Back
      </a>
      <div class="card">
         <div class="card-body">
            <div class="row">
               <div class="col-md-4 form-group">
                  <label>Role</label>
                  <input type="text" value="{{ $user->role_as == '1' ? 'admin':'user'}}" class="form-control">
               </div>
               <div class="col-md-4 form-group">
                  <label>First Name</label>
                  <input type="text" value="{{ $user->name }}" class="form-control">
               </div>
               <div class="col-md-4 form-group">
                  <label>Last Name</label>
                  <input type="text" value="{{ $user->lname }}" class="form-control">
               </div>
               <div class="col-md-4 form-group">
                  <label>Email</label>
                  <input type="text" value="{{ $user->email }}" class="form-control">
               </div>
               <div class="col-md-4 form-group">
                  <label>Phone</label>
                  <input type="text" value="{{ $user->phone }}" class="form-control">
               </div>
               <div class="col-md-4 form-group">
                  <label>Address1</label>
                  <input type="text" value="{{ $user->address1 }}" class="form-control">
               </div>
               <div class="col-md-4 form-group">
                  <label>Address2</label>
                  <input type="text" value="{{ $user->address2 }}" class="form-control">
               </div>
               <div class="col-md-4 form-group">
                  <label>City</label>
                  <input type="text" value="{{ $user->city }}" class="form-control">
               </div>
               <div class="col-md-4 form-group">
                  <label>State</label>
                  <input type="text" value="{{ $user->state }}" class="form-control">
               </div>
               <div class="col-md-4 form-group">
                  <label>Country</label>
                  <input type="text" value="{{ $user->country }}" class="form-control">
               </div>
               <div class="col-md-4 form-group">
                  <label>Pincode</label>
                  <input type="text" value="{{ $user->pincode }}" class="form-control">
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection