<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        // dd($this->all());
        return [
            'name' =>'required|min:3|max:100',
            'email' =>'required|email|unique:users,email',
            'password' =>'required|min:8|max:100',
            'address' =>'required|min:8',
            'role'=>'required|in:' . implode(',',config('common.users.role')),
            'gender'=>'required|in:' . implode(',',config('common.users.gender')),
        ];
    }

    public function messages(){
        return [
            'required' =>':attribute không được để trống',
            'min' => ":atribute tối thiểu gồm 3 ký tự",
            'max' => ":atribute tối đa gồm 100 ký tự",
            'in' => ":atribute giá trị không đúng",
            'email' => ":atribute không đúng dạng email.",
            'unique' => ":atribute đã tồn tại.",

        ];
    }

    public function attribute(){
        return [
            'name' =>"Tên ",
            'email' =>"Email",
            'password' =>"Password",
            'address' =>"Address",
            'role' =>"Tài khoản",
            'gender' =>"Giới tính",

        ];
    }
}
