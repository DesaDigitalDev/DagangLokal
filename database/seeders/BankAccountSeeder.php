<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class BankAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        for($j = 1; $j <= 7; $j++){
            for($i = 1; $i <= 4; $i++){
                \DB::table('bank_accounts')->insert([
                    'bank_id' => $j,
                    'user_id' => $i,
                    'name' => $faker->name,
                    'account_no' => $faker->randomNumber(9, true),
                    'type' => 'Tabungan',
                    'created_at'=>date('Y-m-d H:i:s'),
                    'updated_at'=>date('Y-m-d H:i:s')
                ]);
            }
        }
    }
}
