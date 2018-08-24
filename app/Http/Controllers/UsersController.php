<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserEditFormRequest;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Order;
use App\OrderDetail;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $user = Auth::user();
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = Auth::user();
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserEditFormRequest $request)
    {
        $user = Auth::user();
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->address = $request->get('address');
        $user->description = $request->get('description');
        $user->phone = $request->get('phone');
        $user->password = bcrypt($request->get('password'));
        $file = $request->file('image_url');
        $name = $file->getClientOriginalName();
        $user->image_url = 'images/home/'.$name;
        $user->save();
        return redirect(action('UsersController@show'))->with('status', 'User profile has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function showOrder()
    {
        $user = Auth::user();
        $orders = $user->order;
        return view('users.order', compact('user', 'orders'));
    }

    public function showOrderDetails($id)
    {
        $result = [];
        $user = Auth::user();
        $orders = Order::where('user_id', $user->id)->get();
        $orderDetails = OrderDetail::where('order_id',$id)->get();
        // return var_dump($result[0][1]);
        return view('users.orderDetail', compact('user', 'orders', 'orderDetails'));
    }
}
