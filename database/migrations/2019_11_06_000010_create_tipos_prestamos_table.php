<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTiposPrestamosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipos_prestamo', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipo_prestamo',50)->unique();
            $table->string('corto',4)->unique();
            $table->float('tasa',5,2)->default(0.00);
            $table->unsignedInteger('tipo_socio_id')->nullable();
            $table->float('tasa_mensual',5,2)->default(0.00);
            $table->boolean('capital_x_periodo')->default(1);
            $table->boolean('interes_x_periodo')->default(1);
            $table->string('cuenta_capital',4)->nullable();
            $table->string('cuenta_interes',4)->nullable();
            $table->string('cuenta_puente',4)->nullable();
            $table->string('cuenta_resultados',4)->nullable();
            $table->boolean('predeterminado')->default(0);
            $table->boolean('prestamo_vs_ahorro')->default(0);
            $table->unsignedInteger('estado_id')->nullable();
            $table->timestamps();
            // Llaves foráneaas
            $table->foreign('estado_id')->references('id')->on('estados');
            $table->foreign('tipo_socio_id')->references('id')->on('tipos_socio');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipos_prestamo');
    }
}
