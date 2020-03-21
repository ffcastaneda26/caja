<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadosTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		DB::table('estados')->insert([
			'estado' => 'Activo',
			'corto' => 'Activ',
			'predeterminado' => 1,
		]);

		DB::table('estados')->insert([
			'estado' => 'Pendiente',
			'corto' => 'Pend',
			'predeterminado' => 0,
		]);

		DB::table('estados')->insert([
			'estado' => 'Liquidado',
			'corto' => 'Liqu',
			'predeterminado' => 0,
		]);

		DB::table('estados')->insert([
			'estado' => 'Aplicado',
			'corto' => 'Apli',
			'predeterminado' => 0,
		]);

		DB::table('estados')->insert([
			'estado' => 'Inactivo',
			'corto' => 'Inact',
			'predeterminado' => 0,
		]);

		DB::table('estados')->insert([
			'estado' => 'Por Aplicar',
			'corto' => 'XApl',
			'predeterminado' => 0,
		]);

		DB::table('estados')->insert([
			'estado' => 'Terminado',
			'corto' => 'Term',
			'predeterminado' => 0,
		]);

		DB::table('estados')->insert([
			'estado' => 'Cancelado',
			'corto' => 'Canc',
			'predeterminado' => 0,
		]);

		//factory(Estado::class, 10)->create();
	}
}
