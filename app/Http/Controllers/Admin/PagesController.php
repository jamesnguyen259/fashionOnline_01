<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Post;
use App\Order;
use App\Product;

class PagesController extends Controller
{
    public function home()
    {
        $users_no = User::all()->count();
        $posts_no = Post::all()->count();
        $orders_no = Order::all()->count();
        $products_no = Product::all()->count();
        return view('backend.home',compact('users_no','posts_no','orders_no','products_no'));
    }
}
