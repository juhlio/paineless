<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('endereco')->nullable();
            $table->string('estado', 2)->nullable();
            $table->string('cep')->nullable();
            $table->string('cnpj')->nullable();
            $table->string('ie')->nullable();
            $table->string('tipoContrato')->nullable();
            $table->string('vendedor')->nullable();
            $table->string('tecnico')->nullable();
            $table->string('periodicidade')->nullable();
            $table->string('visitas')->nullable();
            $table->string('sla')->nullable();
            $table->string('regiao')->nullable();
            $table->string('observacao')->nullable();
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
        Schema::dropIfExists('clients');
    }
}
