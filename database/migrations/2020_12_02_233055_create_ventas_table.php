<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();            
            $table->unsignedBigInteger('idAsegurado');
            $table->unsignedBigInteger('idDeudor');
            $table->string('factura',50)->nullable();
            $table->decimal('importe',12,2)->nullable()->default(0.0);
            $table->decimal('iva',12,2)->nullable()->default(0.0);
            $table->decimal('importeTotal',12,2)->nullable()->default(0.0);
            $table->string('monedaFactura',5)->nullable();
            $table->date('fechaFactura')->nullable();
            $table->date('fechaVencimiento')->nullable();
            $table->string('plazoCredito',30)->nullable();
            $table->date('fechaPago')->nullable();
            $table->string('destino',30)->nullable();
            $table->string('tipoFactura',30)->nullable();
            $table->string('estatusCliente',30)->nullable();
            $table->text('comentarios')->nullable();
            $table->date('mesyear');
            $table->timestamps();
            $table->foreign('idAsegurado')->references('id')->on('asegurados');
            $table->foreign('idDeudor')->references('id')->on('deudors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ventas');
    }
}
