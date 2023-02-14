<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saida extends Model
{
    protected $fillable = [
        'idConsumiveis',
        'quantidade',
        'estado',
        'data',
        'cliente',
        'solicitante',
    ];
    use HasFactory;
}
