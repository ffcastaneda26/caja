<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrestamosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestamos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('folio')->unsigned();
            $table->unsignedInteger('socio_id');
            $table->unsignedInteger('tipo_prestamo_id');
            $table->date('fecha');
            $table->integer('plazo')->unsigned();
            $table->date('fecha_vencimiento');
            $table->integer('periodo_vence')->unsigned();
            $table->unsignedInteger('aval1_id');
            $table->unsignedInteger('aval2_id');
            $table->float('tasa', 8, 3)->default(0.00);
            $table->float('capital', 8, 2)->default(0.00);
            $table->float('intereses', 8, 2)->default(0.00);
            $table->string('cheque',15)->unique();
            $table->float('pago_inicial_capital', 8, 3)->default(0.00);
            $table->float('pago_inicial_interes', 8, 3)->default(0.00);
            $table->float('amortizacion_capital', 8, 3)->default(0.00);
            $table->float('amortizacion_interes', 8, 3)->default(0.00);
            $table->float('saldo_capital', 8, 3)->default(0.00);
            $table->float('saldo_interes', 8, 3)->default(0.00);
            $table->integer('pagos_capital')->unsigned()->default(0);
            $table->integer('pagos_interes')->unsigned()->default(0);
            $table->date('fecha_inicio_capital');
            $table->date('fecha_inicio_interes');
            $table->float('penalizacion_porcentaje', 8, 3)->nullable();
            $table->float('importe_penalizacion', 8, 2)->default(0.00);
            $table->unsignedInteger('estado_id')->nullable()->default(1);
            $table->timestamps();
            // Llaves foráneaas
            $table->foreign('socio_id')->references('id')->on('socios');
            $table->foreign('tipo_prestamo_id')->references('id')->on('tipos_prestamo');
            $table->foreign('aval1_id')->references('id')->on('socios');
            $table->foreign('aval2_id')->references('id')->on('socios');
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
        Schema::dropIfExists('presatamos');
    }
}
