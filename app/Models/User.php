<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $fillable = [
        'name',
        'email',
        'password',
        'address',
        'gender',
        'role',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    // code thêm sửa xoá và lấy dữ liệu
     // chỉ định tên table trong trường hợp không đặt tên theo quy tắc của Eloquent
     protected $table = 'users';

     // Mặc định . eloquents coi cái primary key là cột id
     protected $primariKey = 'id';
}
