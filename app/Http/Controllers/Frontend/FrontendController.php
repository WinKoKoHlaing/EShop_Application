<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    public function index(){
        $trending_product = Product::where('trending','1')->take(10)->get();
        $popular_category = Category::where('popular','1')->take(10)->get();
        return view('frontend.index',compact('trending_product','popular_category'));
    }

    public function category(){
       $categories = Category::where('status','0')->get();
        return view('frontend.category',compact('categories'));
    }

    public function categoryView($slug){
        if(Category::where('slug',$slug)->exists()){
            $category = Category::where('slug',$slug)->first(); 
            $products = Product::where('cate_id',$category->id)->where('status','0')->get();
            return view('frontend.category_view',compact('category','products'));
        }else{
            return redirect('/')->with('success','Slug doesnot exist.');
        }

    }

    public function productView($c_slug,$p_slug){
        if(Category::where('slug',$c_slug)->exists()){
            if(Product::where('slug',$p_slug)->exists()){
                $product = Product::where('slug',$p_slug)->first();
                return view('frontend.product_view',compact('product'));
            }else{
                return redirect('/')->with('success','The link was broken.');
            }
        }else{
            return redirect('/')->with('success','No such category found!');
        }
    }
   
}
