<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContentsRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'menu_link' => 'required',
            'title' => 'required|min:4|max:255',
            'description' => 'required|min:4',
        ];
    }
}
