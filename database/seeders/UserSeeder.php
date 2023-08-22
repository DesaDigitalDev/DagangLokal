<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        DB::table('users')->insert([
            'name' => "admin",
            'role_id' => 1,
            'email' => "admin@gmail.com",
            'mobile_number' => $faker->unique()->phoneNumber,
            'password' => "admin",
            'date_of_birth' => $faker->date,
            'address' => $faker->address,
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);

        for($j = 1; $j <= 5; $j++){
            for($i = 1; $i <= 5; $i++){
                DB::table('users')->insert([
                    'name' => $faker->name,
                    'role_id' => $j,
                    'email' => $faker->unique()->email,
                    'mobile_number' => $faker->unique()->phoneNumber,
                    'password' => $faker->sha1,
                    'date_of_birth' => $faker->date,
                    'address' => $faker->address,
                    'created_at'=>date('Y-m-d H:i:s'),
                    'updated_at'=>date('Y-m-d H:i:s')
                ]);

            }
        }
    }
}
