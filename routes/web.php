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

Route::get('/admin/users', function (){
    // Lấy ra toàn bộ giữ liệu trong bảng users
    $listUser = DB::table('users')->get();
    // dd($listUser);
    return view('admin/users/index',[
        'data'=>$listUser,
    ]);
    // cách 2 : có thể dùng admin.users.index cũng đc

})->name('admin.users.index');

Route::view('/admin/users/create','admin/users/create')
->name('admin.users.create');

Route::post('admin/users',function(){
   //  dd($_REQUEST);
    // Buổi sau mới lưu dữ liệu vào bd sau
    return redirect()->route('admin.users.index');

})->name('admin.users.store');

Route::get('admin/users/edit/{id}',function($id){
    // nhận dữ liệu và lưu dữ liệu vào db
    $data = DB::table('users')->find($id);
    // dd($id);
    // dd($data);
    return view('admin/users/edit',[
        'data' =>$data
    ]);

})->name('admin.users.edit');

// Update giữ liêu
Route::post('admin/users/update/{id}',function(){
    dd($_REQUEST);
    return redirect()->route('admin.users.index');

})->name('admin.users.update');

// xoá dữ liêu
Route::get('admin/users/delete/{id}',function(){
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

// 3. Bảng products
Route::get('/admin/products',function(){
    $listPro = DB::table('products')->get();
    // dd($listUser);
    return view('admin/products/index',[
        'data'=> $listPro
    ]);
});
