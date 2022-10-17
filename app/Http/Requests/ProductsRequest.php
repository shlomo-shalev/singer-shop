<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ProductsRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules(Request $request)
    {

        $product_id = ',' . $request['item_id'] ?? '';

        return [
            'category' => 'required',
            'title' => 'required|min:4|max:255',
            'price' => 'required|numeric',
            'url' => 'required|min:4|regex:/^[a-z\d-]+$/|unique:products,purl' . $product_id,
            'description' => 'required|min:4',
            'image' => 'image',
        ];
    }
}
