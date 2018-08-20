<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;

use App\Comment;

class ProductController extends Controller
{
    public function product()
    {
        $products = Product::paginate(9);
        return view('product.product', ['products'=>$products]);
    }
    public function productDetails($id)
    {
        $product =Product::find($id);
        $comments=Comment::where('type', 'product')->where('post_or_product_id', $id)->get();
        return view('product.product-details', ['product'=>$product,'comments'=>$comments]);
    }
}
