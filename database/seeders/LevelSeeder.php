<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('levels')->insert([
            ['name' => 'Bronze',
            'description' => 'Exp = 0-100',
            'created_at'  =>date('Y-m-d H:i:s'),
            'updated_at'  =>date('Y-m-d H:i:s')],
            ['name' => 'Silver',
            'description' => 'Exp = 100-300',
            'created_at'  =>date('Y-m-d H:i:s'),
            'updated_at'  =>date('Y-m-d H:i:s')],
            ['name' => 'Gold',
            'description' => 'Exp = 300 -600',
            'created_at'  =>date('Y-m-d H:i:s'),
            'updated_at'  =>date('Y-m-d H:i:s')],
            ['name' => 'Platinum',
            'description' => 'Exp = 600 - 1000',
            'created_at'  =>date('Y-m-d H:i:s'),
            'updated_at'  =>date('Y-m-d H:i:s')],
            ['name' => 'Diamond',
            'description' => 'Exp = 1000 - 1500',
            'created_at'  =>date('Y-m-d H:i:s'),
            'updated_at'  =>date('Y-m-d H:i:s')],
            ['name' => 'Ultimate',
            'description' => 'Exp = > 1500',
            'created_at'  =>date('Y-m-d H:i:s'),
            'updated_at'  =>date('Y-m-d H:i:s')],
        ]);
    }
}
