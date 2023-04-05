<?php

namespace App\Http\Controllers\Backend;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::where('status','0')->orderBy('id','desc')->get();
        return view('backend.order.index',compact('orders'));
    }

    public function orderview(Request $request,$id){
        $orders = Order::where('id',$id)->first();
        return view('backend.order.view',compact('orders'));
    }

    public function orderupdate(Request $request,$id){
        // return $request->input('order_status');
        $orders = Order::find($id);
        $orders->status = $request->input('order_status');
        $orders->update();
        return redirect('admin/order')->with('success','Order Updated Successfully.');
    }

    public function orderhistory(){
        $complete_orders = Order::where('status','1')->get();
        return view('backend.order.history',compact('complete_orders'));
    }
}
