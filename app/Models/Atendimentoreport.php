<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atendimentoreport extends Model
{

    protected $fillable = [
        'idEquip',
        'endereco',
        'tipoEquipamento',
        'horaChamado',
        'tipoConexao',
        'caminhao',
        'seccaoCondutor',
        'lancesPorFase',
        'lancesNeutro',
        'horimetroInicial',
        'horimetroFinal',
        'kwhInicial',
        'kwhFinal',
        'chegadaGmg',
        'inicioOperacao',
        'terminoOperacao',
        'obs',
        'statusRelatorio',
    ];

    use HasFactory;
}
