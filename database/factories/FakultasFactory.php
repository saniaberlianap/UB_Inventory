<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Fakultas;

use Faker\Generator as Faker;

$factory->define(Fakultas::class, function (Faker $faker) {

	$listFakultas = [
            'Fakultas Ilmu Komputer', 
            'Fakultas Hukum',
            'Fakultas Ilmu Administrasi',
            'Fakultas Teknik',
            'Fakultas Kedokteran',
            'Fakultas Matematika dan Ilmu Pengetahuan Alam',
            'Fakultas Ilmu Sosial dan Ilmu Politik',
            'Program Pendidikan Vokasi', 
            ];

    return [
        'nama_fakultas' => $faker->unique()->randomElement($listFakultas)
    ];
});
