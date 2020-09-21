<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class MenuRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules(Request $request)
    {

        $menu_id = ',' . $request['item_id'] ?? '';

        return [
            'title' => 'required|min:4|max:255',
            'url' => 'required|min:4|regex:/^[a-z\d-]+$/|unique:menus,url' . $menu_id,
            'link' => 'required|min:4|max:255',
        ];
    }
}
