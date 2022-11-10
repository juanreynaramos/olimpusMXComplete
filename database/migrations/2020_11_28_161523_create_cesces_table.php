<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCescesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cesces', function (Blueprint $table) {
            $table->id();
            $table->string('nombreDeudor',150);
            $table->string('rfc',25)->nullable();
            $table->string('paisDeudor',50)->nullable();
            $table->decimal('importeSolicitado',12,2)->nullable()->default(0.0);
            $table->decimal('importeConcedido',12,2)->nullable()->default(0.0);
            $table->string('divisa',5)->nullable();
            $table->string('condicionesPagoConcedido',50)->nullable();
            $table->string('situacion',50)->nullable();
            $table->date('fechaEfecto')->nullable();
            $table->date('fechaAnulacion')->nullable();
            $table->date('fechaValidez')->nullable();
            $table->string('condicionesPagoSolicitado',50)->nullable();
            $table->date('fechaSolicitud')->nullable();
            $table->string('reporteComercial',10)->nullable();
            $table->string('reportePolitico',10)->nullable();
            $table->decimal('importeVentasAnual',12,2)->nullable()->default(0.0);
            $table->decimal('importeVentasAnual1',12,2)->nullable()->default(0.0);
            $table->string('avalistas',5)->nullable();
            $table->string('motivosClasificacion',30)->nullable();
            $table->string('referenciaCliente',30)->nullable();
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
        Schema::dropIfExists('cesces');
    }
}
