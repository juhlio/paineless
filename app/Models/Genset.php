<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genset extends Model
{

    protected $fillable =[
        'idCliente',
        'tipoEquipamento',
        'identificacao',
        'fabricante',
        'numeroSerie',
        'dataFabricacao',
        'potencia',
        'abrangencia',
        'tanqueBase',
        'aberturaJanelaBase',
        'capacidadeTanqueBase',
        'tanqueDiario',
        'aberturaJanelaDiario',
        'capacidadeTanqueDiario',
        'tanqueMensal',
        'aberturaJanelaMensal',
        'capacidadeTanqueMensal',
        'fabricanteMotor',
        'modeloMotor',
        'serieMotor',
        'quantidadeOleoLubrificante',
        'modeloFiltroCombustivel',
        'quantidadeFiltroCombustivel',
        'modeloFiltroSeparador',
        'quantidadeFiltroSeparador',
        'modeloFiltroAgua',
        'quantidadeFiltroAgua',
        'modeloFiltroOleo',
        'quantidadeFiltroOleo',
        'quantidadeFiltroOleo',
        'modeloFiltroAr',
        'quantidadeFiltroAr',
        'fabricanteAlternador',
        'modeloAlternador',
        'serieAlternador',
        'fabricanteModuloGrupo',
        'modeloModuloGrupo',
        'fabricanteModuloQta',
        'modeloModuloQta',
        'fabricanteChaveGrupo',
        'modeloChaveGrupo',
        'fabricanteChaveRede',
        'modeloChaveRede',
    ];

    use HasFactory;
}
