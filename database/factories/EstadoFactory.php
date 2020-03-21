<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Estado;
use Faker\Generator as Faker;

$factory->define(Estado::class, function (Faker $faker) {
	$estado = $faker->text(15);
	$corto = substr($estado, 0, 5);
	return [
		'estado' => $estado,
		'corto' => $corto,
		'predeterminado' => 0,
	];
});
