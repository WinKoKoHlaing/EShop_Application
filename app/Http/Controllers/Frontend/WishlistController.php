<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function addToWishlist(Request $request){
        $product_id = $request->input('product_id');

        if(Auth::check()){
            $product_check = Product::where('id',$product_id)->first();
            if($product_check){
                if(!Wishlist::where('product_id',$product_check->id)->where('user_id',Auth::id())->exists()){
                    $wishlist = new Wishlist();
                    $wishlist->product_id = $product_id; 
                    $wishlist->user_id = Auth::id(); 
                    $wishlist->save(); 
                    return response()->json(['success' => $product_check->name.' add to wishlist successfully.']);
                }else{
                    return response()->json(['success' => $product_check->name.' Already added to wishlist']);
                }
            }
            return response()->json(['success' => 'Product doesnot exist.']);
        }else{
            return response()->json(['success' => 'Please , login first !']);
        }

        // if(Auth::check()){
        //     if(Product::find($product_id)){
        //         $wishlist = new Wishlist();
        //         $wishlist->product_id = $product_id;
        //         $wishlist->user_id = Auth::id();
        //         $wishlist->save();
        //         return response()->json(['success' => 'Product add to wishlist successfully.']);
        //     }else{
        //         return response()->json(['success' => 'Product does not exist.']);
        //     }
        // }else{
        //     return response()->json(['success' => 'Please Login First !']);
        // }
    }

    public function viewWishlist(){
        $wishlists = Wishlist::where('user_id',Auth::id())->get();
        return view('frontend.wishlist',compact('wishlists'));
    }

    public function removeWishlist(Request $request){
        $product_id = $request->input('product_id');
        
        if(Auth::check()){
            if(Wishlist::where('product_id',$product_id)->where('user_id',Auth::id())->exists()){
                $wishlist = Wishlist::where('product_id',$product_id)->where('user_id',Auth::id())->first();
                $wishlist->delete();
                return response()->json(['success' => 'Wishlist Item removed successfully.']);
            }

        }else{
            return response()->json(['success' => 'Please , Login First !']);
        }
    }

    public function wishlistcount(){
        $wishlist_count = Wishlist::where('user_id',Auth::id())->count();
        return response()->json(['success' => $wishlist_count]);
    }

}
