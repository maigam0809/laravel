<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
// use DB; not use vì nó là bản mới k sử dụng đc


Route::get('/', function () {
    return view('welcome');
});

// match , any
// - với match : mapping url với callback tương ứng, mapping theo nhiều phương thức http đã khai báo
// - any : mapping url với callback tương ứng , mapping với tất cả phương thức http
//putch /patch/ delete / redirect



// bài thứ 3
//  hai cái  này có goì khác  nhau {!! !!} {{ }}
Route::view('/layout','layout');
Route::view('/tin-tuc','tin_tuc');

// todo users name
// 1. Bảng users
use App\Models\User;
Route::get('/admin/users', function (){
    // Lấy ra toàn bộ giữ liệu trong bảng users
   // cách 1: Dùng kết nối với DB: $listUser = DB::table('users')->get();
    $listUser = User::all();
    // dd($listUser);
    return view('admin/users/index',[
        'data'=>$listUser,
    ]);
    // cách 2 : có thể dùng admin.users.index cũng đc

})->name('admin.users.index');

Route::view('/admin/users/create','admin/users/create')
->name('admin.users.create');

Route::post('admin/users',function(){
    // Lấy dữ liệu gửi lên
    //cách 1: dd($_REQUEST);
    // cách 2: vẫn lấy token
    // dd(request()->all());
    // cách 3 : Loại bỏ không lấy token
    // dd(request()->except('_token'));
    $data = request()->except('_token');
    $data['password'] = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi';

    $result = User::create($data);

    // dd($result);

    return redirect()->route('admin.users.index');

})->name('admin.users.store');

Route::get('admin/users/edit/{id}',function($id){
    // nhận dữ liệu và lưu dữ liệu vào db
    // $data = DB::table('users')->find($id);
    // dd($id);
    // dd($data);

    $data = User::find($id);
    return view('admin/users/edit',[
        'data' =>$data
    ]);

})->name('admin.users.edit');

// Update giữ liêu
Route::post('admin/users/update/{id}',function($id){
    // dd($_REQUEST);
    $data = request()->except('_token');
    $user = User::find($id);
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

})->name('admin.users.update');

// xoá dữ liêu
Route::post('admin/users/delete/{id}',function($id){
    $result = User::find($id);
    // dd($id);
    $result->delete();
    return redirect()->route('admin.users.index');
})->name('admin.users.delete');

// 2. Bảng categories

Route::get('/admin/categories',function(){
    $listCate = DB::table('categories')->get();
    // dd($listUser);
    return view('admin/categories/index',[
        'data'=> $listCate
    ]);
});

// 2. 1 Thêm dữ liệu vào bảng categories
Route::post('admin/categories',function(){
    $data = request()->except('_token');
    // $data['password'] = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi';
    $result = User::create($data);
    return redirect()->route('admin.categories.index');

})->name('admin.categories.store');


// 3. Bảng products
Route::get('/admin/products',function(){
    $listPro = DB::table('products')->get();
    // dd($listUser);
    return view('admin/products/index',[
        'data'=> $listPro
    ]);
});
