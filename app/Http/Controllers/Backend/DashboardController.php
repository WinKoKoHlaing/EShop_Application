<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class DashboardController extends Controller
{
    public function dashboard(){
        return view('backend.dashboard');
    }

    public function index(){
        $users = User::all();
        return view('backend.user.index',compact('users'));
    }

    public function view(Request $request, $id){
        $user = User::find($id);
        return view('backend.user.view',compact('user'));
    }
}
