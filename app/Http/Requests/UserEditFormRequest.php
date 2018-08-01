<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserEditFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:3',
            'email' => 'required|string|email|max:255|unique:users',
            'description' => 'string|max:255',
            'address' => 'string|max:255',
            'phone' => 'digits:11',
            'password' => 'required|string|min:6|same:password_confirmation',
            'password_confirmation' => 'required|string|min:6',
            'image_url' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
}
