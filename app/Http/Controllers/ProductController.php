<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;

class ProductController extends Controller
{
    public function product()
    {
        $products = Product::paginate(9);
        return view('product.product',['products'=>$products]);
    }
    public function productDetails($id)
    {
    	$product=Product::find($id);
    	return view('product.product-details',['product'=>$product]);
    }
}
