<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRevisionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('revisions', function (Blueprint $table) {
            $table->id();
            $table->string('idCliente');
            $table->string('idGmg');
            $table->string('tipoEquipamento');
            $table->string('identificacao');
            $table->string('fabricante');
            $table->string('numeroSerie');
            $table->string('dataFabricacao');
            $table->string('potencia');
            $table->string('abrangencia');
            $table->string('tanqueBase');
            $table->string('aberturaJanelaBase');
            $table->string('capacidadeTanqueBase');
            $table->string('tanqueDiario');
            $table->string('aberturaJanelaDiario');
            $table->string('capacidadeTanqueDiario');
            $table->string('tanqueMensal');
            $table->string('aberturaJanelaMensal');
            $table->string('capacidadeTanqueMensal');
            $table->string('fabricanteMotor');
            $table->string('modeloMotor');
            $table->string('serieMotor');
            $table->string('quantidadeOleoLubrificante');
            $table->string('modeloFiltroCombustivel');
            $table->string('quantidadeFiltroCombustivel');
            $table->string('modeloFiltroSeparador');
            $table->string('quantidadeFiltroSeparador');
            $table->string('modeloFiltroAgua');
            $table->string('quantidadeFiltroAgua');
            $table->string('modeloFiltroOleo');
            $table->string('quantidadeFiltroOleo');
            $table->string('modeloFiltroAr');
            $table->string('quantidadeFiltroAr');
            $table->string('fabricanteAlternador');
            $table->string('modeloAlternador');
            $table->string('serieAlternador');
            $table->string('fabricanteModuloGrupo');
            $table->string('modeloModuloGrupo');
            $table->string('fabricanteModuloQta');
            $table->string('modeloModuloQta');
            $table->string('fabricanteChaveGrupo');
            $table->string('modeloChaveGrupo');
            $table->string('fabricanteChaveRede');
            $table->string('modeloChaveRede');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('revisions');
    }
}
