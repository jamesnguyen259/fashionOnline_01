<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserEditFormRequest;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show()
    {
        $user = Auth::user();
        return view('users.show', compact('user'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('users.edit', compact('user'));
    }

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
        return redirect(action('UserController@show'))->with('status', 'User profile has been updated!');
    }
}
