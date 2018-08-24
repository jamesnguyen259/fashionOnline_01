<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CheckoutFormRequest;
use Illuminate\Support\Facades\Auth;
use App\OrderDetail;
use App\Order;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $cartItems = Cart::content();
            $user = Auth::user();
            return view('checkout', compact('user','cartItems'));
        } else {
            return redirect('/login')->with('status', 'You must login first!');
        }
    }

    public function store(CheckoutFormRequest $request)
    {
        $cartItems = Cart::content();
        $order = new Order(array(
            'name' => $request->get('name'),
            'address' => $request->get('address'),
            'email' => $request->get('email'),
            'payment' => $request->get('payment'),
            'user_id' => Auth::user()->id,
            'total' => Cart::total(),
            'order_status' => 'not accepted',
            ));
        $order->save();
        foreach($cartItems as $cartItem){
            $order_detail = new OrderDetail(array(
                'order_id' => $order->id,
                'product_id' => $cartItem->id,
                'quantity' => $cartItem->qty,
                'sub_price' => $cartItem->subtotal,
                ));
            $order_detail->save();
        }
        Cart::destroy();
        return redirect(action('HomeController@index'))->with('status', '
        Your order has been created!');
    }
}
