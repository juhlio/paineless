<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obsprospecto extends Model
{
    protected $fillable =[
        'idprospect',
        'obs',
    ];
    use HasFactory;
}
