<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipoSociosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipos_socio', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipo_socio',30)->unique()->nullable();
            $table->string('corto',8)->unique()->nullable();
            $table->boolean('predeterminado')->default(0);
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
        Schema::dropIfExists('tipos_socio');
    }
}
