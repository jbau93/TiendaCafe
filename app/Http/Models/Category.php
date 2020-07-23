<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table = 'categories'; //usamos la tabla categories
    protected $hiden = ['created_at', 'updated_at']; //ocultamos los campos
}
