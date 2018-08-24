<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::paginate(9);
        return view('backend.orders.index', compact('orders'));
    }

    public function update($id)
    {
        $order = Order::find($id);
        $order->order_status = 'accepted';
        $order->save();
        return redirect(action('Admin\OrderController@index'))->with('status', '
        The order has been accepted!');
    }
}
