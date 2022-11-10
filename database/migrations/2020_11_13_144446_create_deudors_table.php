<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeudorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deudors', function (Blueprint $table) {
            $table->id();
            $table->string('razonSocial');
            $table->string('rfc',20)->nullable()->default('S/N');
            $table->string('pais')->nullable()->default('S/N');
            $table->string('cp')->nullable()->default('S/N');
            $table->string('ciudad')->nullable()->default('S/N');
            $table->string('poblacion')->nullable()->default('S/N');
            $table->string('codigoPais')->nullable()->default('S/N');
            $table->string('estadoProvincia')->nullable()->default('S/N');
            $table->string('direccion')->nullable()->default('S/N');
            $table->string('claveCliente')->nullable()->default('S/N');
            $table->string('duns',15)->nullable()->default('S/N');
            $table->string('giro',8)->nullable()->default('S/N');
            $table->text('descripcionGiro')->nullable();
            $table->timestamps();
        });
    }
// agregar campos del DUNS y giro y descripción de la empresa   4975   12354   17329 nombre de contacto
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deudors');
    }
}
