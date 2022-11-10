<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Atradius extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atradii', function (Blueprint $table) {
            $table->id();
            $table->string('numeroPoliza',10);
            $table->string('nombreasegurado',50);
            $table->integer('idCliente')->default(0);
            $table->string('nombreCliente',150);
            $table->string('direccionCliente')->nullable()->default('S/N');
            $table->string('ciudadCliente',100)->nullable();
            $table->string('cpCliente',10)->nullable();
            $table->string('areaCliente',50)->nullable();
            $table->string('paisCliente',50);
            $table->string('codigoPaisCliente',3);
            $table->string('numeroRegistro',25)->nullable();
            $table->string('dunyBradstreet',15)->nullable();
            $table->string('sectorComercial',5)->nullable();
            $table->string('descripcionSectorComercial')->nullable();
            $table->string('ratingActualCliente',5)->nullable();
            $table->string('claseRatingCliente',5)->nullable();
            $table->date('fechaRatingActualCliente')->nullable();
            $table->string('ratingAnteriorCliente',5)->nullable();
            $table->string('claseRatingAnteriorCliente',5)->nullable();
            $table->string('cambioRatingCliente',5)->nullable();
            $table->string('idLimiteCredito',12)->nullable();
            $table->string('monedaPoliza',25)->nullable();
            $table->string('codigoMonedaPoliza',5);
            $table->decimal('importeSolicitadoLimitesCredito',12,2)->nullable()->default(0.0);
            $table->decimal('importeTotalDecisionesLimiteCredito',12,2)->nullable()->default(0.0);
            $table->decimal('importeDecision1',12,2)->nullable()->default(0.0);
            $table->decimal('importeDecision2',12,2)->nullable()->default(0.0);
            $table->string('monedaUsuario',25)->nullable();
            $table->string('codigoMonedaUsuario',5)->nullable();
            $table->date('fechaSolicitud')->nullable();
            $table->date('fechaDecision')->nullable();
            $table->date('fechaExpiracionImporte1')->nullable();
            $table->date('fechaExpiracionImporte2')->nullable();
            $table->date('fechaEfecto')->nullable();
            $table->date('fechaExpiracion')->nullable();
            $table->string('tipoDecisionLimiteCredito',5)->nullable();
            $table->text('condicionLimiteCreditoImporte1')->nullable();
            $table->text('condicionLimiteCreditoImporte2')->nullable();
            $table->text('condicionImporteTotalLimiteCredito')->nullable();
            $table->string('alertaEventosFuturos')->nullable();
            $table->string('indicadorImpago')->nullable();
            $table->string('causaId',5)->nullable();
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
        //
    }
}
