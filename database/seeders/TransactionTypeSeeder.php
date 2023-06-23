<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('transaction_types')->insert([
            ['name' => 'Withdraw',
            'created_at'  =>date('Y-m-d H:i:s'),
            'updated_at'  =>date('Y-m-d H:i:s')],
            ['name' => 'Saving',
            'created_at'  =>date('Y-m-d H:i:s'),
            'updated_at'  =>date('Y-m-d H:i:s')],
        ]);
    }
}
