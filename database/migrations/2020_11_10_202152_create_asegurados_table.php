<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAseguradosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asegurados', function (Blueprint $table) {
            $table->id();
            $table->string('razonSocial');
            $table->string('direccion')->default('S/N');
            $table->string('rfc')->default('S/N');
            $table->string('email')->default('S/N');
            $table->string('email2')->default('S/N');
            $table->string('email3')->default('S/N');
            $table->string('email4')->default('S/N');
            $table->decimal('valorSaldoEstimadoPromedio',6,2)->default(0.0);
            $table->softDeletes();
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
        Schema::dropIfExists('asegurados');
    }
}
