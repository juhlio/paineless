<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imagemrelatorio extends Model
{
    protected $fillable =[
        'idRelatorio',
        'url',
        'posicao',
    ];
    use HasFactory;
}
