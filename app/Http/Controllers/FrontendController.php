<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;

class FrontendController extends Controller
{
    function index() {
        $products = Product::all();
        return view('welcome', compact('products'));
    }

    function contact(){
        return view('contact');
    }

    function about(){
        return view('about');
    }
    function productdetails($product_id){
        $single_product_info = Product::find($product_id);
        $related_products = Product::where('id', '!=', $product_id )->get();
        return view('frontend/product-details', compact(['related_products', 'single_product_info']));
    }
}
