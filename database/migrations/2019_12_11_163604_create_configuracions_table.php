<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfiguracionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configuracion', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('nombre',50)->unique()->nullable();
            $table->string('corto',10)->unique()->nullable();
            $table->float('ahorro_minimo', 8, 2);
            $table->integer('periodos')->unsigned();
            $table->integer('poliza')->unsigned();
            $table->float('penalizacion',5,2)->default(30.00);
            $table->float('minimo_prestamo', 8, 2);
            $table->integer('limite_prestamos')->unsigned()->default(1);
            $table->boolean('liquida_intereses')->default(1);
            $table->boolean('ajustar_pagos')->default(1);
            $table->float('ajustar_pagos_a', 8, 2)->default(1.00);
            $table->unsignedInteger('prestamo_id_ahorro')->nullable();
            $table->integer('periodo_vence_ahorro')->unsigned()->default(23);
            $table->unsignedInteger('prestamo_id_defecto')->nullable();
            $table->string('ruta_polizas',191)->nullable();
            $table->string('ruta_pronosticos',191)->nullable();
            $table->string('cuenta_bancos',4)->nullable();
            $table->string('subcuenta_bancos',2)->nullable();
            $table->string('auxiliar_bancos',3)->nullable(); 
            $table->string('cuenta_resultados',4)->nullable();                       
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
        Schema::dropIfExists('configuracion');
    }
}
