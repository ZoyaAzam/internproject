<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyError extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = 'myerrors';
    protected $fillable = ['id','details','appindex','type','st'];
}
