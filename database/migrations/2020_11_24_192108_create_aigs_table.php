<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aigs', function (Blueprint $table) {
            $table->id();
            $table->date('effectiveDate')->nullable();
            $table->string('buyer',150);
            $table->string('country',50);
            $table->string('duns',15);
            $table->string('globalUltName',150);
            $table->decimal('requestedLimitAmount',12,2)->nullable()->default(0.0);/// importeSolicitadoLimitesCredito
            $table->string('reqLimCurrency',5)->nullable();///codigoMonedaUsuario
            $table->decimal('approvedLimitAmount',12,2)->nullable()->default(0.0);///importeTotalDecisionesLimiteCredito
            $table->string('apprLimCurrency',5)->nullable();///codigoMonedaPoliza
            $table->date('expiryDate')->nullable();
            $table->string('specialLimitConditions',5)->nullable();
            $table->text('specialConditions')->nullable();//condicionLimiteCreditoImporte1
            $table->string('causaId',5)->nullable();
            $table->timestamps();
        });

        /// solicitar layout de ventas a denesse -- verificar que campos son requeridos
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aigs');
    }
}
