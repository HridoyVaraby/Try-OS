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

    }
}
