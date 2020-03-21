<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimientos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('socio_id');
            $table->unsignedInteger('clave_id');
            $table->unsignedInteger('periodo_id');
            $table->date('fecha');
            $table->float('importe', 8, 2);
            $table->string('descripcion',50)->nullable();
            $table->string('referencia',8)->nullable();
            $table->unsignedInteger('prestamo_id')->nullable();
            $table->string('cuenta',4)->nullable();
            $table->string('subcuenta',2)->nullable();
            $table->string('auxiliar',3)->nullable(); 
            $table->boolean('contabilizado')->default(0);
            $table->unsignedInteger('estado_id')->nullable()->default(1);
            $table->timestamps();
            // Llaves foráneaas
            $table->foreign('socio_id')->references('id')->on('socios');
            $table->foreign('clave_id')->references('id')->on('claves');
            $table->foreign('prestamo_id')->references('id')->on('prestamos');
            $table->foreign('estado_id')->references('id')->on('estados');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movimientos');
    }
}
