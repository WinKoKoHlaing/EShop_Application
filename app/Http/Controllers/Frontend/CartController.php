<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addToCart(Request $request){
        $product_id = $request->input('product_id');//10
        $product_qty = $request->input('product_qty');//2

        // $product = Product::where('id',$product_id)->first();//product_id
        // $user = User::where('id',Auth::id());//user-id

        if(Auth::check()){
            $product_check = Product::where('id',$product_id)->first();
            // return response()->json(['success' => $product_check]);
            if($product_check){
                if(!Cart::where('product_id',$product_check->id)->where('user_id',Auth::id())->exists()){
                    $cartItem = new Cart();
                    $cartItem->product_id = $product_id; 
                    $cartItem->user_id = Auth::id(); 
                    $cartItem->product_qty = $product_qty;
                    $cartItem->save(); 
                    return response()->json(['success' => $product_check->name.' add to cart']);
                }else{
                    return response()->json(['success' => $product_check->name.' Already added to cart']);
                }
            }
            return response()->json(['success' => 'Product doesnot exist.']);
        }else{
            return response()->json(['success' => 'Please , login first !']);
        }
    }

    public function viewCart(Request $request){
        $cartItems = Cart::where('user_id',Auth::id())->get();
        return view('frontend.cart',compact('cartItems'));
    }

    public function removeCart(Request $request){
        if(Auth::check()){
            $product_id = $request->input('product_id');
            if(Cart::where('product_id',$product_id)->where('user_id',Auth::id())->exists()){
                $product = Cart::where('product_id',$product_id)->where('user_id',Auth::id())->first();
                $product->delete();
                return response()->json(['success' => 'Product Successfully Removed!']);
            }
        }else{
            return response()->json(['success' => 'Login to Continue.']);
        }
    }

    public function updateCart(Request $request){
        $product_id = $request->input('product_id');
        $product_qty = $request->input('product_qty');
        if(Auth::check()){
            if(Cart::where('product_id',$product_id)->where('user_id',Auth::id())->exists()){
                $cartItem = Cart::where('product_id',$product_id)->where('user_id',Auth::id())->first();
                $cartItem->product_qty = $product_qty;
                $cartItem->update();

                return response()->json(['success' => 'Quantity Updated']);
            }

        }
    }

    public function cartcount(){
        $cart_count = Cart::where('user_id',Auth::id())->count();
        return response()->json(['success' => $cart_count]);
    }
}
