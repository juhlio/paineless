<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageRevision extends Model
{

    protected $fillable =[
        'idCliente',
        'posicao',
        'url',
    ];

    use HasFactory;
}
