<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(FakultasSeeder::class);
        $this->call(JurusanSeeder::class);
        $this->call(RuanganSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(BarangSeeder::class);
    }
}
