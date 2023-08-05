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
        \DB::table('products')->insert([
            ['name' => 'Teh Daun Saga',
            'category_id' => 2,
            'user_id' => 2,
            'vendor' => 'UMKM Maju Jaya',
            'is_in_warehouse' => 1,
            'unit_price' => 9900,
            'unit_in_stock' => 200,
            'unit_weight' => 100,
            'bpom_no' => '',
            'description' => '',
            'created_at'  =>date('Y-m-d H:i:s'),
            'updated_at'  =>date('Y-m-d H:i:s')],

            ['name' => 'Ginseng Merah',
            'category_id' => 1,
            'user_id' => 2,
            'vendor' => 'UMKM Maju Mundur',
            'is_in_warehouse' => 1,
            'unit_price' => 9900,
            'unit_in_stock' => 200,
            'unit_weight' => 100,
            'bpom_no' => '',
            'description' => '',
            'created_at'  =>date('Y-m-d H:i:s'),
            'updated_at'  =>date('Y-m-d H:i:s')],

            
            ['name' => 'Sandal Akupuntur',
            'category_id' => 1,
            'user_id' => 2,
            'vendor' => 'UMKM Maju Mundur',
            'is_in_warehouse' => 1,
            'unit_price' => 9900,
            'unit_in_stock' => 200,
            'unit_weight' => 100,
            'bpom_no' => '',
            'description' => '',
            'created_at'  =>date('Y-m-d H:i:s'),
            'updated_at'  =>date('Y-m-d H:i:s')],

            ['name' => 'Madu Hitam',
            'category_id' => 1,
            'user_id' => 2,
            'vendor' => 'UMKM Kitar',
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
