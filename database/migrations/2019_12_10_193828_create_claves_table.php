<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('claves', function (Blueprint $table) {
            $table->increments('id');
            $table->string('clave',30)->unique()->nullable();
            $table->string('corta',8)->unique()->nullable();
            $table->enum('tipo', ['A', 'C']);
            $table->string('cuenta',4)->nullable();
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
        Schema::dropIfExists('claves');
    }
}
