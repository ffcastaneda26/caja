<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('empresa',50)->unique()->nullable();
            $table->string('corto',10)->unique()->nullable();
            $table->string('subcuenta',2)->nullable();
            $table->string('responsable',40)->nullable();
            $table->float('capital', 8, 2)->default(0.00);
            $table->float('intereses', 8, 2)->default(0.00);
            $table->float('total', 8, 2)->default(0.00);
            $table->unsignedInteger('estado_id')->nullable();
            $table->timestamps();
            // Llaves foráneaas
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
        Schema::dropIfExists('empresas');
    }
}
