<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePolizasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('polizas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idAseguradora');
            $table->unsignedBigInteger('idAsegurado');
            $table->string('poliza');
            $table->date('inicioVigencia');
            $table->date('finVigencia');
            $table->string('tipoPrograma')->nullable();
            $table->decimal('pronosticoVentas','18','2')->nullable()->default(0.0);
            $table->decimal('tasa','5','5')->nullable()->default(0.0);
            $table->decimal('primaTotal','18','2')->nullable()->default(0.0);
            $table->decimal('primaMinima','18','2')->nullable()->default(0.0);
            $table->decimal('pagoTrimestral','18','2')->nullable()->default(0.0);
            $table->string('monedaPoliza');
            //Condiciones Particulares
            //Países cubiertos
            $table->string('paisesCubiertos')->nullable();
            $table->enum('paisesCubiertosTodos',['SI','NO'])->default('NO');
            $table->decimal('porcentajeCoberturaParticular','8','2')->nullable()->default(0.0);
            $table->decimal('creditoIndividual','18','2')->nullable()->default(0.0);
            $table->decimal('deducibleAnual','18','2')->nullable()->default(0.0);
            $table->decimal('responsabilidadMaxima','18','2')->nullable()->default(0.0);
            $table->decimal('montoMaximoAcumulado','18','2')->nullable()->default(0.0);
            //Cobertura de Discrecionales
            $table->decimal('importe','18','2')->nullable()->default(0.0);
            $table->decimal('porcentajeCoberturaDiscrecional','8','2')->nullable()->default(0.0);
            $table->integer('indemnizaciones')->nullable()->default(0);
            $table->decimal('montoMaximoIndemnizaciones','18','2')->nullable()->default(0.0);
            $table->string('requisitoLimiteCredito')->nullable();
            //Cobertura primer embarque
            $table->decimal('montoCoberturaPrimerEmbarque','18','2')->nullable()->default(0.0);
            $table->decimal('porcentajeCoberturaPrimerEmbarque','2','2')->nullable()->default(0.0);
            $table->integer('numMaximoIndemnizacionesPrimerEmbarque')->nullable()->default(0);
            //plazos de credito
            $table->integer('periodoDeclaracionSiniestro')->nullable()->default(0);
            $table->string('apartirDe')->nullable();
            $table->integer('plazoCredito')->nullable()->default(0);
            $table->integer('plazoCreditoEspecialPoliza')->nullable()->default(0);
            $table->string('plazoCreditoEspecialDeudor')->nullable();
            $table->integer('periodoCobroVencido')->nullable()->default(0);
            $table->integer('plazoMEP')->nullable()->default(0);
            $table->integer('periodoEsperaMora')->nullable()->default(0);
            $table->string('suspensionAutomaticaCobertura')->nullable();
            $table->decimal('limiteMaximoProrrogas','18','2')->nullable()->default(0.0);
            //Bonus
            $table->integer('retorno')->nullable()->default(0);
            $table->integer('porcentaje')->nullable()->default(0);
            $table->decimal('siniestralidad0','8','2')->nullable()->default(0.0);
            $table->decimal('siniestralidad10','8','2')->nullable()->default(0.0);
            $table->integer('bonoSiniestralidad15al18')->nullable()->default(0);
            $table->integer('bonoSiniestralidad15')->nullable()->default(0);
            $table->decimal('siniestralidad30','8','2')->nullable()->default(0.0);
            $table->decimal('siniestralidad70','8','2')->nullable()->default(0.0);
            $table->decimal('siniestralidad100','8','2')->nullable()->default(0.0);
            //Servicios Adicionales
            $table->decimal('estudioDeudoresDomestico','18','2')->nullable()->default(0.0);
            $table->decimal('estudioDeudoresExportacion','18','2')->nullable()->default(0.0);
            $table->decimal('revisionClasificaciones','18','2')->nullable()->default(0.0);
            $table->decimal('mantenimientoClasificaciones','18','2')->nullable()->default(0.0);
            $table->decimal('gastosAperturaDomestico','18','2')->nullable()->default(0.0);
            $table->decimal('gastosAperturaExportacion','18','2')->nullable()->default(0.0);
            $table->decimal('costosProrroga','18','2')->nullable()->default(0.0);
            $table->string('sistemaLinea')->nullable();
            $table->string('endososEspeciales')->nullable();
            //Notas
            $table->text('notas')->nullable();
            $table->timestamps();
            $table->foreign('idAseguradora')->references('id')->on('aseguradoras')->onDelete('cascade');
            $table->foreign('idAsegurado')->references('id')->on('asegurados')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('polizas');
    }
}
