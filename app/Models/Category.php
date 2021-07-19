<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
     // chỉ định tên table trong trường hợp không đặt tên theo quy tắc của Eloquent
     protected $table = 'categories';

     // Mặc định . eloquents coi cái primary key là cột id
     protected $primariKey = 'id';
}
