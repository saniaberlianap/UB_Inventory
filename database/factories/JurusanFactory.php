<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Jurusan;
use Faker\Generator as Faker;

$factory->define(Jurusan::class, function (Faker $faker) {

	$listJurusan = [
                        'Sistem Informasi',
                        'Ilmu Hukum',
                        'Administrasi Pendidikan',
                        'Teknik Sipil',
                        'Farmasi',
                        'Biologi',
                        'Sosiologi',
                        'D3 Teknik Komputer'
                    ];

    return [
        'nama_jurusan' => $faker->unique()->randomElement($listJurusan),
        'fakultas_id' => $faker->numberBetween($min = 1, $max = 8)
    ];
});
