<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLineasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lineas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idAseguradora');
            $table->unsignedBigInteger('idAsegurado');
            $table->unsignedBigInteger('idDeudor');
            $table->date('fechaSolicitud')->nullable();
            $table->decimal('importeSolicitado',12,2)->nullable()->default(0.0);
            $table->decimal('importeAsegurado',12,2)->nullable()->default(0.0);
            $table->string('decision',25)->nullable();
            $table->string('tipoDesicion')->nullable();
            $table->date('fechaEfecto')->nullable();
            $table->date('fechaVencimiento')->nullable();
            $table->date('fechaAnulacion')->nullable();
            $table->string('divisaSolicitada',5)->nullable();
            $table->string('divisaAsegurada',5)->nullable();
            $table->text('desicion1')->nullable();
            $table->text('desicion2')->nullable();
            $table->text('desicion3')->nullable();
            $table->decimal('importeVentasAnual',12,2)->nullable()->default(0.0);
            $table->string('condicionesPagoSolicitado',50)->nullable();
            $table->string('condicionesPagoConcedido',50)->nullable();
            $table->string('rating',10)->nullable();
            $table->string('ratingAnterior',10)->nullable();
            $table->string('causaId',5)->nullable();
            $table->date('mesyear');
            $table->timestamps();
            $table->foreign('idAseguradora')->references('id')->on('aseguradoras');
            $table->foreign('idAsegurado')->references('id')->on('asegurados');
            $table->foreign('idDeudor')->references('id')->on('deudors');
        });
    }
/// agregar campo Dun & Bradstreet de atradius o DUNS de aig
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lineas');
    }
}
