<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\Admin\User\StoreRequest;

class UserController extends Controller
{
    public function index(){
        $listUser = User::all();
        $listUser->load('invoices');

        // So sánh giữa invoices và invoices()
        // $user->invoice->count();
        $user = $listUser->first();

        // dd($user->invoices()->count());
        // dd($user->invoices->count());

        return view('admin/users/index',[
            'users'=>$listUser,
        ]);
    }
    public function show(User $user){
        // $users = User::find($user);
        // dd($user);

        return view('admin/users/show',[
            'user'=>$user,
        ]);

    }
    public function create(){
        return view('/admin/users/create');
    }
    public function store(StoreRequest $request){
        //cách 1: dd($_REQUEST);
        // cách 2: vẫn lấy token
        // dd(request()->all());
        // cách 3 : Loại bỏ không lấy token
        // dd(request()->except('_token'));
        $data = request()->except('_token');
        // $data['password'] = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi';

        $result = User::create($data);

        // dd($result);

        return redirect()->route('admin.users.index');
    }
    public function edit(User $user){
        // $users = User::find($user);
        return view('admin/users/edit',[
            'user' =>$user
        ]);
    }

    public function update(User $user){
        // dd($_REQUEST);
        // $users = User::find($user);
        $data = request()->except('_token');
        // $data['password'] = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi';
        // cách 1
        // $user->name = $data['name'];
        // $user->email = $data['email'];
        // $user->password = $data['password'];
        // $user->address = $data['address'];
        // $user->gender = $data['gender'];
        // $user->role = $data['name'];
        // cách 2 :
        // dd($data,$user);
        $user->update($data);

        return redirect()->route('admin.users.index');

    }


    public function delete(User $user){
        // $result = User::find($id);
        // dd($id);
        $user->delete();
        return redirect()->route('admin.users.index');
    }

}
