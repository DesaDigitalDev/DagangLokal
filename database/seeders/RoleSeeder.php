<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('roles')->insert([
            ['role_title' => 'Super User',
            'description' => 'Superuser merupakan akun pengguna khusus yang digunakan untuk administrasi sistem.',
            'created_at'  =>date('Y-m-d H:i:s'),
            'updated_at'  =>date('Y-m-d H:i:s')],
            ['role_title' => 'Information Technology Support',
            'description' => 'Information technology support, adalah seorang yang bertanggung jawab dalam pengembangan sistem jaringan, peningkatan dan evaluasi terhadap objek komputer, instalasi, dan software.',
            'created_at'  =>date('Y-m-d H:i:s'),
            'updated_at'  =>date('Y-m-d H:i:s')],
            ['role_title' => 'Manager',
            'description' => 'Manajer adalah orang yang bertanggung jawab untuk mengarahkan usaha yang bertujuan membantu organisasi dalam mencapai sasarannya.',
            'created_at'  =>date('Y-m-d H:i:s'),
            'updated_at'  =>date('Y-m-d H:i:s')],
            ['role_title' => 'Customer Service',
            'description' => 'Customer Service adalah divisi perusahaan yang bertugas untuk memberikan bantuan dan arahan kepada, serta menerima pertanyaan, komentar, dan keluhan dari orang-orang yang hendak membeli atau menggunakan produk atau layanan.',
            'created_at'  =>date('Y-m-d H:i:s'),
            'updated_at'  =>date('Y-m-d H:i:s')],
            ['role_title' => 'Administrator',
            'description' => 'Administrator adalah orang yang bertugas untuk mengurusi hal-hal administrasi.',
            'created_at'  =>date('Y-m-d H:i:s'),
            'updated_at'  =>date('Y-m-d H:i:s')],
            ['role_title' => 'Customer Relationship Management',
            'description' => 'Customer Relationship Management adalah seseorang yang melakukan pendekatan bisnis untuk mengelola dan memperkuat hubungan antara perusahaan dengan pelanggan.',
            'created_at'  =>date('Y-m-d H:i:s'),
            'updated_at'  =>date('Y-m-d H:i:s')],
            ['role_title' => 'Social Media Customer Service',
            'description' => 'Social Media Customer Service adalah divisi perusahaan yang bertugas untuk memberikan bantuan dan arahan kepada, serta menerima pertanyaan, komentar, dan keluhan dari orang-orang yang hendak membeli atau menggunakan produk atau layanan pada sosial media.',
            'created_at'  =>date('Y-m-d H:i:s'),
            'updated_at'  =>date('Y-m-d H:i:s')],
            ['role_title' => 'Advertiser',
            'description' => 'Advertiser adalah seseorang penyedia iklan.',
            'created_at'  =>date('Y-m-d H:i:s'),
            'updated_at'  =>date('Y-m-d H:i:s')],
            ['role_title' => 'Content Creator',
            'description' => 'Content Creator adalah orang yang membuat konten edukatif atau menghibur sesuai keinginan audiens.',
            'created_at'  =>date('Y-m-d H:i:s'),
            'updated_at'  =>date('Y-m-d H:i:s')],
            ['role_title' => 'Producer',
            'description' => 'Penyedia Barang.',
            'created_at'  =>date('Y-m-d H:i:s'),
            'updated_at'  =>date('Y-m-d H:i:s')],
            ['role_title' => 'Client',
            'description' => 'Pembeli Barang.',
            'created_at'  =>date('Y-m-d H:i:s'),
            'updated_at'  =>date('Y-m-d H:i:s')],

        ]);
    }
}
