<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductRatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('product_ratings')->insert([
            ['product_id' => 5,
            'user_id' => '2',
            'rating_value' => 2,
            'date' => date('Y-m-d H:i:s'),
            'created_at'  =>date('Y-m-d H:i:s'),
            'updated_at'  =>date('Y-m-d H:i:s')],

            ['product_id' => 6,
            'user_id' => '2',
            'rating_value' => 5,
            'date' => date('Y-m-d H:i:s'),
            'created_at'  =>date('Y-m-d H:i:s'),
            'updated_at'  =>date('Y-m-d H:i:s')],
            
            ['product_id' => 7,
            'user_id' => '2',
            'rating_value' => 5,
            'date' => date('Y-m-d H:i:s'),
            'created_at'  =>date('Y-m-d H:i:s'),
            'updated_at'  =>date('Y-m-d H:i:s')],

            ['product_id' => 8,
            'user_id' => '2',
            'rating_value' => 4,
            'date' => date('Y-m-d H:i:s'),
            'created_at'  =>date('Y-m-d H:i:s'),
            'updated_at'  =>date('Y-m-d H:i:s')],
            
        ]);
    }
}
