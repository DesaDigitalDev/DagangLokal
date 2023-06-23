<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class WarehouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        \DB::table('warehouses')->insert([
        ['name' => 'Cabang Utama',
        'city' => $faker->city,
        'full_address' => $faker->address],
        ['name' => 'Barat',
        'city' => $faker->city,
        'full_address' => $faker->address]
        ]);
    }
}
