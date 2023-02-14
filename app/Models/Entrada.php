<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
     protected $fillable =[
        'idConsumiveis',
        'fornecedor',
        'nf',
        'quantidade',
        'novo',
        'tipoEntrada',
        'data',
    ];
    use HasFactory;
}
