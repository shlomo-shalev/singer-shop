<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class SignupRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|min:2|max:30',
            'email' => 'required|email|min:6|unique:users,email',
            'password' => 'required|min:6|max:30',
        ];
    }
}