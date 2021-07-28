<?php

namespace App\Http\Requests\Admin\Category;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' =>'required|unique:categories|min:3|max:100',
        ];
    }

    public function messages(){
        return [
            'required' => ':attribute không được để trống',
            'min' => ":atribute tối thiểu gồm 3 ký tự",
            'max' => ":atribute tối đa gồm 100 ký tự",
        ];
    }

    public function attribute(){
        return [
            'name' =>"Tên "

        ];
    }
}
