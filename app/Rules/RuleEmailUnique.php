<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\User;
class RuleEmailUnique implements Rule
{

    public function __construct()
    {
        //
    }


    public function passes($attribute, $newEmail)
    {
        $oldEmail =request()->user->email;

        // dd("okok",$oldEmail);
        if($newEmail === $oldEmail){
            // Không update email->trả về true -> cho phép request tiếp tục
            return true;
        }
        // Select count(*) form users where email = {$newEmail}
        $kiemTra = User::where('email',$newEmail)->count();
        if($kiemTra > 0){
            return false;
        }
        return true;
        // dd($attribute,$value,request()->user);
        //
    }

    public function message()
    {
        return 'Email này đã tồn tại.';
    }
}
