<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaestraContablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maestras_contables', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('clave_id')->nullable();
            $table->enum('tipo', ['A', 'C']);
            $table->enum('cuenta', ['CUENTA','CAPITAL','INTERES','PUENTE','RESULTADOS','EMPRESA']);
            $table->enum('subcuenta', ['EE','EM']);
            $table->enum('auxiliar', ['AA','EE','EM']);
            $table->enum('importe', ['PENALIZA','CAPITAL','INTERES','AHORRO','AHORRADO','CAPITALINTERES']);
            $table->timestamps();
            // Llaves foráneas
            $table->foreign('clave_id')->references('id')->on('claves');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('maestras_contables');
    }
}
