<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function products(){
        return view('products');
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
}
