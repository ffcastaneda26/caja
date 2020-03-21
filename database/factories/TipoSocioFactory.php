<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\TipoSocio;
use Faker\Generator as Faker;

$factory->define(TipoSocio::class, function (Faker $faker) {
	$tipo_socio = $faker->text(30);
	$corto = substr($tipo_socio, 0, 8);
	return [
		'tipo_socio' => $tipo_socio,
		'corto' => $corto,
		'predeterminado' => 0,
	];
});
