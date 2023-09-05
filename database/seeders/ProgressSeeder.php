<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProgressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('Progress')->insert([
            [
                'name' => 'Verifikasi Berkas',
                'description' => 'Selamat, berkas anda sudah memenuhi persyaratan.',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Sedang Dikurasi',
                'description' => 'Produk anda sedang dikurasi oleh tim kami.',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Feedback',
                'description' => 'Produk anda sudah selesai dikurasi, tim kami akan menghubungi anda.',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Selesai',
                'description' => 'SELAMAT, produk anda berhasil diverifikasi..',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Tidak Lolos Berkas',
                'description' => 'Mohon maaf, berkas anda belum memenuhi persyaratan.',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Feedback Tidak Lolos',
                'description' => 'Produk anda sudah selesai dikurasi, tim kami akan menghubungi anda.',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s')
            ],
        ]);
    }
}
