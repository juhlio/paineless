<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EquipamentoAllexoDado extends Model
{

    protected $fillable = [
        'idEquip',
        'symbol',
        'valor',
    ];

    use HasFactory;
}
