<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    function addproductview()
    {
        $products = Product::paginate(8);
        $deleted_products = Product::onlyTrashed()->get();
        return view('product/view', compact('products', 'deleted_products'));
    }

    function addproductinsert(Request $request)
    {
        $request->validate([
            'product_name' => 'required',
            'product_description' => 'required',
            'product_price' => 'required',
            'product_quantity' => 'required',
            'alart_quantity' => 'required',
        ]);
        
        Product::insert( [
            'product_name' => $request->product_name,
            'product_description' => $request->product_description,
            'product_price' => $request->product_price,
            'product_quantity' => $request->product_quantity,
            'alart_quantity' => $request->alart_quantity,
        ] );
        return back()->with('status', 'Product Inserted Successfully!');
    }

    function deleteproduct($product_id)
    {
        Product::find($product_id)->delete();
        return back()->with('delete_status', 'Product Deleted Successfully!');
    }

    function editproduct($product_id)
    {
        $single_product_info = Product::findOrFail($product_id);
        return view("product/edit", compact('single_product_info'));
    }

    function editproductinsert(Request $request)
    {
        Product::find($request->product_id)->update([
            'product_name' => $request->product_name,
            'product_description' => $request->product_description,
            'product_price' => $request->product_price,
            'product_quantity' => $request->product_quantity,
            'alart_quantity' => $request->alart_quantity,
        ]);

        return back()->with('updatestatus', 'Product updated Successfully!');
    }
}
