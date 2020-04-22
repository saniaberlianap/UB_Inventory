<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Barang;

use Faker\Generator as Faker;

$factory->define(Barang::class, function (Faker $faker) {

	$list_barang = [
    	'Komputer',
    	'Modul Hukum ketatanegaraan',
    	'Converter HDMI',
    	'Kertas A3',
    	'Tabung Reaksi',
    	'Jas Lab',
    	'Modul',
    	'Projector'
    ];


    return [
        
    	'nama_barang' => $faker->randomElement($list_barang),
        'total' => $faker->numberBetween($min = 2, $max = 12),
        'broken' => $faker->numberBetween($min = 0, $max = 5),
        'image' => 'books.png',
        'created_by' => 1,
        'ruangan_id' => $faker->unique()->randomElement([1,2,3,4,5,6,7,8])

    ];
});