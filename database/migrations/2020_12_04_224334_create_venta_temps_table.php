<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentaTempsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venta_temps', function (Blueprint $table) {
            $table->id();
            $table->string('razonSocial',150)->nullable();
            $table->string('identificador',25)->nullable();
            $table->string('pais',50)->nullable();
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
        Schema::dropIfExists('venta_temps');
    }
}
