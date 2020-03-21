<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run() {

		$this->truncateTables([
			'users',
			'estados',
			'tipos_socio',
			'tipos_prestamo',
			'claves',
			'permissions',
		]);

		$this->call([
			UsersTableSeeder::class,
			EstadosTableSeeder::class,
			TiposSocioTableSeeder::class,
			TiposPrestamoTableSeeder::class,
			ClavesTableSeeder::class,
			PermissionsTableSeeder::class,
		]);
	}

	protected function truncateTables(array $tables) {
		\DB::statement('SET FOREIGN_KEY_CHECKS = 0;'); // Desactivamos la revisión de claves foráneas
		foreach ($tables as $table) {

			DB::table($table)->truncate();
		}
		\DB::statement('SET FOREIGN_KEY_CHECKS = 1;'); // Desactivamos la revisión de claves foráneas
	}
}
