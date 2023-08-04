<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function products(){
        $products = Product::latest()->paginate(5);
        return view('products', compact('products'));
    }

    // add product
    public function AddProduct(Request $request){
        $request->validate(
            [
                'name'=>'required|unique:products,name',
                'price'=>'required',
            ],
            [
                'name.required' => 'Name is required',
                'name.unique' => 'Product already exist!',
                'price.required' => 'Price is required',
            ]
        );

        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->save();
        return response()->json([
            'status'=>'success',
        ]);
    }

    // update product
    public function UpdateProduct(Request $request){
        $request->validate(
            [
                'update_name'=> 'required|unique:products,name,'.$request->update_id,
                'update_price'=>'required',
            ],
            [
                'update_name.required' => 'Name is required',
                'update_name.unique' => 'Product already exist!',
                'update_price.required' => 'Price is required',
            ]
        );

        Product::where('id', $request->update_id)->update([
            'name'=>$request->update_name,
            'price'=>$request->update_price,
        ]);
        return response()->json([
            'status'=>'success',
        ]);
    }

    // delete product

    public function deleteProduct(Request $request){
        Product::find($request->product_id)->delete();
        return response()->json([
            'status'=>'success',
        ]);
    }


    // pagination
    public function pagination(){
        $products = Product::latest()->paginate(5);
        return view('products_paginate', compact('products'))->render();
    }

    // search functionality
        public function searchProduct(Request $request){
        $products = Product::where('name', 'like', '%'.$request->search.'%')->orWhere('price', 'like', '%'.$request->search.'%')->orderBy('id', 'desc')->paginate(5);

        if($products->count() >= 1){
            return view('products_paginate', compact('products'))->render();
        }else{
            return response()->json([
                'status' => 'nothing_found',
            ]);
        }
    }
}
