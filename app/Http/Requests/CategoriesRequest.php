<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class CategoriesRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules(Request $request)
    {

        $category_id = ',' . $request['item_id'] ?? '';

        return [
            'title' => 'required|min:4|max:255',
            'url' => 'required|min:4|regex:/^[a-z\d-]+$/|unique:categories,url' . $category_id,
            'description' => 'required|min:4',
            'image' => 'image',
        ];
    }
}
