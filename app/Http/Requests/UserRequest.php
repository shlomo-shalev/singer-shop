<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UserRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules(Request $request)
    {

        $user_id = ',' . $request['item_id'] ?? '';
        $password = 'required|min:6|max:30';
        if( $request['pas_default'] ){

            $password = $request['password'] ? 'min:6|max:30' : '';
            
        }
        
        return [
            'name' => 'required|min:2|max:30',
            'email' => 'required|email|min:6|unique:users,email' . $user_id,
            'password' => $password,
            'rid' => 'required|numeric',
        ];
    }
}