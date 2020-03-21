<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSociosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('socios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',50)->unique();
            $table->unsignedInteger('empresa_id');
            $table->unsignedInteger('tiposocio_id');
            $table->string('empleado',10)->unique();
            $table->float('ahorro', 8, 2)->default(100.00);
            $table->string('auxiliar',8)->nullable();
            $table->float('ahorrado', 8, 2)->default(0.00);
            $table->float('capacidad', 8, 2)->nullable()->default(0.00);
            $table->float('capital_avalado', 8, 2)->default(0.00);
            $table->float('interes_avalado', 8, 2)->default(0.00);
            $table->integer('prestamos_usados')->unsigned()->default(0);
            $table->integer('prestamos_vigentes')->unsigned()->default(0);
            $table->integer('prestamos_avalados')->unsigned()->default(0);
            $table->integer('prestamos_avalados_vigentes')->unsigned()->default(0);
            $table->float('abonos', 8, 2)->default(0.00);
            $table->string('referencia_liq',10)->nullable();
            $table->date('fecha_liquidado')->nullable();
            $table->unsignedInteger('estado_id')->nullable()->default(1);
            $table->timestamps();
            // Llaves foráneaas
            $table->foreign('estado_id')->references('id')->on('estados');
            $table->foreign('empresa_id')->references('id')->on('empresas');
            $table->foreign('tiposocio_id')->references('id')->on('tipos_socio');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('socios');
    }
}
