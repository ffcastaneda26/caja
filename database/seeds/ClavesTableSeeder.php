<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClavesTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {

		DB::table('claves')->insert([
			'clave' => 'Depósito de Ahorro',
			'corta' => 'AHORRO',
			'tipo' => 'A',
			'cuenta' => 2100,
		]);

		DB::table('claves')->insert([
			'clave' => 'Bonificación de Intereses',
			'corta' => 'BONINTE',
			'tipo' => 'A',
		]);

		DB::table('claves')->insert([
			'clave' => 'Devolución de Ahorro',
			'corta' => 'DEVAHOR',
			'tipo' => 'C',
		]);

		DB::table('claves')->insert([
			'clave' => 'Liquidación de Préstamos',
			'corta' => 'LIQAPRES',
			'tipo' => 'A',
		]);

		DB::table('claves')->insert([
			'clave' => 'Pago Capital',
			'corta' => 'PAGOCAPI',
			'tipo' => 'A',
		]);

		DB::table('claves')->insert([
			'clave' => 'Pago Interés',
			'corta' => 'PAGOINTE',
			'tipo' => 'A',
		]);

		DB::table('claves')->insert([
			'clave' => 'Penalización de Intereses',
			'corta' => 'PENAINTE',
			'tipo' => 'A',
		]);

		DB::table('claves')->insert([
			'clave' => 'Préstamo Capital',
			'corta' => 'PRESCAPI',
			'tipo' => 'C',
		]);

		DB::table('claves')->insert([
			'clave' => 'Préstamo Interés',
			'corta' => 'PRESINTE',
			'tipo' => 'C',
		]);

	}
}
