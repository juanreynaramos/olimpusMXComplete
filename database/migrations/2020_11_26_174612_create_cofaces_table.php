<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCofacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cofaces', function (Blueprint $table) {
            $table->id();
            $table->string('razonSocial',150);
            $table->string('direccion')->nullable()->default('S/N');
            $table->string('ciudadCliente',100)->nullable();
            $table->string('cpCliente',10)->nullable();
            $table->string('estadoProvincia',50)->nullable();
            $table->string('paisCliente',50)->nullable();
            $table->string('codigoPaisCliente',3)->nullable();
            $table->string('duns',12)->nullable();
            $table->string('rfc',25)->nullable();
            $table->string('producto',30)->nullable();
            $table->string('rating',10)->nullable();
            $table->date('fechaSolicitud')->nullable();
            $table->decimal('importeSolicitado',12,2)->nullable()->default(0.0);
            $table->string('importeDivisaSolicitada',5)->nullable();
            $table->string('modoPago')->nullable();
            $table->date('fechaDecision')->nullable();
            $table->string('estadoDesicion',50)->nullable();
            $table->string('tipoDesicion')->nullable();
            $table->string('desicion1')->nullable();
            $table->string('desicion2')->nullable();
            $table->string('desicion3')->nullable();
            $table->date('fechaEfecto')->nullable();
            $table->date('fechaFinalizacion')->nullable();
            $table->decimal('cantidadAsegurada',12,2)->nullable()->default(0.0);
            $table->string('monedaAsegurada',25)->nullable();
            $table->text('comentarioDecision')->nullable();
            $table->string('dra',8)->nullable();
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
        Schema::dropIfExists('cofaces');
    }
}
