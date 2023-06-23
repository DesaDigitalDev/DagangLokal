<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('Product')->insert([
            ['name' => 'Teh Daun Saga',
            'category_id' => 1,
            'user_id' => 1,
            'vendor' => 'UMKM Maju Jaya',
            'is_in_warehouse' => 1,
            'unit_price' => 9900,
            'unit_in_stock' => 200,
            'unit_weight' => 100,
            'bpom_no' => '',
            'description' => '',
            'created_at'  =>date('Y-m-d H:i:s'),
            'updated_at'  =>date('Y-m-d H:i:s')],

        ]);
    }
}
