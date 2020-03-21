<?php

use Illuminate\Database\Seeder;

class TiposPrestamoTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {

		DB::table('tipos_prestamo')->insert([
			'tipo_prestamo' => 'NO SOCIO CAPITAL E INTERESES X QUINCENA',
			'corto' => 'NQCI',
			'tasa' => 2.00,
			'capital_x_periodo' => 1,
			'interes_x_periodo' => 1,
			'cuenta_capital' => 1200,
			'cuenta_interes' => 1215,
			'cuenta_puente' => 2200,
			'cuenta_resultados' => 2203,
		]);

		DB::table('tipos_prestamo')->insert([
			'tipo_prestamo' => 'NO SOCIO INTERES X QUINCENA CAPITAL AL VENCIMIENTO',
			'corto' => 'NQIV',
			'tasa' => 3.00,
			'capital_x_periodo' => 0,
			'interes_x_periodo' => 1,
			'cuenta_capital' => 1202,
			'cuenta_interes' => 1217,
			'cuenta_puente' => 2202,
			'cuenta_resultados' => 2203,
		]);

		DB::table('tipos_prestamo')->insert([
			'tipo_prestamo' => 'SOCIO CAPITAL E INTERESES X QUINCENA',
			'corto' => 'SQCI',
			'tasa' => 1.25,
			'capital_x_periodo' => 1,
			'interes_x_periodo' => 1,
			'cuenta_capital' => 1200,
			'cuenta_interes' => 1215,
			'cuenta_puente' => 2200,
			'cuenta_resultados' => 2203,
			'predeterminado' => 1,
		]);

		DB::table('tipos_prestamo')->insert([
			'tipo_prestamo' => 'SOCIO INTERES X QUINCENA CAPITAL CONTRA AHORRO',
			'corto' => 'SQI',
			'tasa' => 2.00,
			'capital_x_periodo' => 0,
			'interes_x_periodo' => 1,
			'cuenta_capital' => 1201,
			'cuenta_interes' => 1217,
			'cuenta_puente' => 2202,
			'cuenta_resultados' => 2203,
			'prestamo_vs_ahorro' => 1,
		]);

		DB::table('tipos_prestamo')->insert([
			'tipo_prestamo' => 'SOCIO INTERES X QUINCENA CAPITAL AL VENCIMIENTO',
			'corto' => 'SQIV',
			'tasa' => 2.00,
			'capital_x_periodo' => 0,
			'interes_x_periodo' => 1,
			'cuenta_capital' => 1202,
			'cuenta_interes' => 1217,
			'cuenta_puente' => 2202,
			'cuenta_resultados' => 2203,
		]);

		//factory(TipoPrestamo::class, 10)->create();
	}
}
