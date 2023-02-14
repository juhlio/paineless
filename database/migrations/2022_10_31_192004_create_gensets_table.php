<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGensetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gensets', function (Blueprint $table) {
            $table->id();
            $table->string('idCliente');
            $table->string('tipoEquipamento')->nullable();
            $table->string('identificacao')->nullable();
            $table->string('fabricante')->nullable();
            $table->string('numeroSerie')->nullable();
            $table->string('dataFabricacao')->nullable();
            $table->string('potencia')->nullable();
            $table->string('abrangencia')->nullable();
            $table->string('tanqueBase')->nullable();
            $table->string('aberturaJanelaBase')->nullable();
            $table->string('capacidadeTanqueBase')->nullable();
            $table->string('tanqueDiario')->nullable();
            $table->string('aberturaJanelaDiario')->nullable();
            $table->string('capacidadeTanqueDiario')->nullable();
            $table->string('tanqueMensal')->nullable();
            $table->string('aberturaJanelaMensal')->nullable();
            $table->string('capacidadeTanqueMensal')->nullable();
            $table->string('fabricanteMotor')->nullable();
            $table->string('modeloMotor')->nullable();
            $table->string('serieMotor')->nullable();
            $table->string('quantidadeOleoLubrificante')->nullable();
            $table->string('modeloFiltroCombustivel')->nullable();
            $table->string('quantidadeFiltroCombustivel')->nullable();
            $table->string('modeloFiltroSeparador')->nullable();
            $table->string('quantidadeFiltroSeparador')->nullable();
            $table->string('modeloFiltroAgua')->nullable();
            $table->string('quantidadeFiltroAgua')->nullable();
            $table->string('modeloFiltroOleo')->nullable();
            $table->string('quantidadeFiltroOleo')->nullable();
            $table->string('modeloFiltroAr')->nullable();
            $table->string('quantidadeFiltroAr')->nullable();
            $table->string('fabricanteAlternador')->nullable();
            $table->string('modeloAlternador')->nullable();
            $table->string('serieAlternador')->nullable();
            $table->string('fabricanteModuloGrupo')->nullable();
            $table->string('modeloModuloGrupo')->nullable();
            $table->string('fabricanteModuloQta')->nullable();
            $table->string('modeloModuloQta')->nullable();
            $table->string('fabricanteChaveGrupo')->nullable();
            $table->string('modeloChaveGrupo')->nullable();
            $table->string('fabricanteChaveRede')->nullable();
            $table->string('modeloChaveRede')->nullable();
            /*  $table->string('idCliente');
            $table->string('fabricanteMotor')->nullable();
            $table->string('modeloMotor')->nullable();
            $table->string('serieMotor')->nullable();
            $table->string('fabricanteAlternador')->nullable();
            $table->string('modeloAlternador')->nullable();
            $table->string('serieAlternador')->nullable();
            $table->string('serieGrupo')->nullable(); */
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
        Schema::dropIfExists('gensets');
    }
}
