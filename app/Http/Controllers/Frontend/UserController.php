<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function myorder(){
        $orders = Order::where('user_id',Auth::id())->get();
        return view('frontend.myorder',compact('orders'));
    }
    public function myorderView($id){
        $order = Order::where('id',$id)->where('user_id',Auth::id())->first();
        return view('frontend.myorder_view',compact('order'));
    }
}
