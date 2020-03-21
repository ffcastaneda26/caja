<?php

use Illuminate\Database\Seeder;

class TiposSocioTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {

		DB::table('tipos_socio')->insert([
			'tipo_socio' => 'Ahorrador',
			'corto' => 'Ahorr',
			'predeterminado' => 1,
		]);

		DB::table('tipos_socio')->insert([
			'tipo_socio' => 'Prestamos',
			'corto' => 'Prest',
			'predeterminado' => 0,
		]);

		//factory(TipoSocio::class, 10)->create();
	}
}
