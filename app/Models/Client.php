<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable =[
        'nome',
        'endereco',
        'estado',
        'cep',
        'cnpj',
        'ie',
        'tipoContrato',
        'vendedor',
        'tecnico',
        'periodicidade',
        'visitas',
    ];

    use HasFactory;
}
