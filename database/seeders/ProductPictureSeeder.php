<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductPictureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    
        \DB::table('product_pictures')->insert([
            ['product_id' => 5,
            'link' => 'https://source.unsplash.com/random',
            'sequence_no' => 2,
            'created_at'  =>date('Y-m-d H:i:s'),
            'updated_at'  =>date('Y-m-d H:i:s')],
            
            ['product_id' => 6,
            'link' => 'https://source.unsplash.com/random',
            'sequence_no' => 2,
            'created_at'  =>date('Y-m-d H:i:s'),
            'updated_at'  =>date('Y-m-d H:i:s')],
    
            ['product_id' => 7,
            'link' => 'https://source.unsplash.com/random',
            'sequence_no' => 2,
            'created_at'  =>date('Y-m-d H:i:s'),
            'updated_at'  =>date('Y-m-d H:i:s')],
    
            ['product_id' => 8,
            'link' => 'https://source.unsplash.com/random',
            'sequence_no' => 2,
            'created_at'  =>date('Y-m-d H:i:s'),
            'updated_at'  =>date('Y-m-d H:i:s')],
        ]);
    }
}
