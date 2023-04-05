<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function checkout(){
        $old_cartItems = Cart::where('user_id',Auth::id())->get();
        foreach($old_cartItems as $cart){
            if(!Product::where('id',$cart->product_id)->where('qty','>=',$cart->product_qty)->exists()){
                $removeItem = Cart::where('user_id',Auth::id())->where('product_id',$cart->product_id)->first();
                $removeItem->delete();
            }
        }
        $cartItems = Cart::where('user_id',Auth::id())->get();
        return view('frontend.checkout',compact('cartItems'));
    }

    public function placeorder(Request $request){
        // Order
        $order = new Order();
        $order->user_id = Auth::id();
        $order->fname = $request->input('fname');
        $order->lname = $request->input('lname');
        $order->email = $request->input('email');
        $order->phone = $request->input('phone');
        $order->address1 = $request->input('address1');
        $order->address2 = $request->input('address2');
        $order->city = $request->input('city');
        $order->state = $request->input('state');
        $order->country = $request->input('country');
        $order->pincode = $request->input('pincode');

        //adding_total_price
        $total = 0;
        $cartItems = Cart::where('user_id',Auth::id())->get();
        foreach($cartItems as $cart){
            $total += $cart->products->selling_price * $cart->product_qty;
        }
        $order->total_price = $total;
        
        $order->tracking_no = 'rose'.rand(1111,9999);
        $order->save();
        

        // OrderItem
        $cartItems = Cart::where('user_id',Auth::id())->get();
        foreach($cartItems as $cart){
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $cart->product_id,
                'qty' => $cart->product_qty,
                'price' => $cart->products->selling_price,
            ]);

            // Product
            $product = Product::where('id',$cart->product_id)->first();
            $product->qty = $product->qty - $cart->product_qty;
            $product->update();
        }

        // User
        if(Auth::user()->address1 == NULL){
            $user = User::where('id',Auth::id())->first();
            $user->name = $request->input('fname');
            $user->lname = $request->input('lname');
            $user->email = $request->input('email');
            $user->phone = $request->input('phone');
            $user->address1 = $request->input('address1');
            $user->address2 = $request->input('address2');
            $user->city = $request->input('city');
            $user->state = $request->input('state');
            $user->country = $request->input('country');
            $user->pincode = $request->input('pincode');
            $user->update();
        }

        // Cart
        $cartItems = Cart::where('user_id',Auth::id())->get();
        Cart::destroy($cartItems);

        return redirect('/')->with('success','Order Placed Successfully');
    }
}
