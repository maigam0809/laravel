<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
// use DB; not use vì nó là bản mới k sử dụng đc


Route::get('/', function () {
    return view('welcome');
});



// Route::post('/admin/users',function(){
//     dd($_REQUEST);
// });
// với phương thức view trả ra view vs đường dẫn
Route::view('/welcome','webcome');

// match , any
// - với match : mapping url với callback tương ứng, mapping theo nhiều phương thức http đã khai báo
// - any : mapping url với callback tương ứng , mapping với tất cả phương thức http

//putch /patch/ delete / redirect

// Route::get('admin/categories',function(){
//     $listCate = DB::table('categories')->get();
//     dd($listCate);
//     // return view('admin/categories/index');
// });


// bài thứ 3
//  hai cái  này có goì khác  nhau {!! !!} {{ }}
Route::view('/layout','layout');
Route::view('/tin-tuc','tin_tuc');

// todo users name

Route::get('/admin/users', function (){
    // var_dump(123);
    // Lấy ra toàn bộ giữ liệu trong bảng users
    $listUser = DB::table('users')->get();
    // dd($listUser);
    return view('admin/users/index',[
        'data'=>$listUser,
    ]);
    // cách 2 : có thể dùng admin.users.index cũng đc

});
Route::view('/admin/users/add','admin/users/create');

Route::get('/admin/categories',function(){
    $listCate = DB::table('categories')->get();
    // dd($listUser);
    return view('admin/categories/index',[
        'data'=> $listCate
    ]);
});

Route::get('/admin/products',function(){
    $listPro = DB::table('products')->get();
    // dd($listUser);
    return view('admin/products/index',[
        'data'=> $listPro
    ]);
});
