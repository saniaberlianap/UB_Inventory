<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Ruangan;
use Faker\Generator as Faker;

$factory->define(Ruangan::class, function (Faker $faker) {

	$listRuangan = [
                        'Lab Komputer 27',
                        'H 85',
                        'IA 14',
                        'T 99',
                        'FK 1',
                        'FMP 12',
                        'FSP 64',
                        'Lab Komputer 303',
                        ];

    return [
        'nama_ruangan' => $faker->unique()->randomElement($listRuangan),
        'jurusan_id' => $faker->unique()->numberBetween($min = 1, $max = 8),
    ];
});
