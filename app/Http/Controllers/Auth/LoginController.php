<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function getLoginForm(){
        \Mail::to('gammai08092000@gmail.com')->send(
            app()->make(\App\Mail\Mail\DemoSendMail::class)
        );
        return view('auth/login');
    }

    public function login(Request $request){
        // dd($request->all());
        $data = $request->only([
            'email',
            'password',
        ]);
        /*Auth:atte */
        $result = Auth::attempt($data);
        // dd($result);
        if($result === false){
            // báo lỗi
            session()->flash('error','sai email or mật khẩu');
            return back();
        }

        $user = Auth::user();
        // dd($user);
        return redirect()->route('admin.users.index');
    }

    public function logout(Request $request){
        Auth::logout();
        return redirect()->route('auth.getLoginForm');

    }
}
