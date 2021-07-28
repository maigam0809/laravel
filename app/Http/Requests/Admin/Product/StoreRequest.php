<?php

namespace App\Http\Requests\Admin\Product;

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
            'price'=>'required|numeric|min:0|not_in:0',
            'quantity'=>'required|numeric|min:0|not_in:0',
        ];
    }

    public function messages(){
        return [
            'required' => ':attribute không được để trống',
            'min:3' => ':atribute tối thiểu gồm 3 ký tự',
            'max' => ':atribute tối đa gồm 100 ký tự',
            'numeric' => ':atribute phải là số',
            'min:0' => ':atribute phải lớn hơn 0',
            'not_in:0' => ':atribute không thể bằng 0',
        ];
    }

    public function attribute(){
        return [
            'name' =>"Tên ",
            'price' =>"Giá ",
            'quantity' =>"Số lượng",

        ];
    }
}
