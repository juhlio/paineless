<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imagemproduto extends Model
{
    protected $fillable =[
        'idProduto',
        'url',
    ];
    use HasFactory;
}
