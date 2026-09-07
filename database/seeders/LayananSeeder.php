<?php

namespace Database\Seeders;

use App\Models\Layanan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LayananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nama_layanan' => 'Konsultasi Bisnis & Legalitas',
                'deskripsi' => 'Layanan pendampingan perizinan usaha, NIB, PT/CV, dan konsultasi strategi bisnis.',
                'icon' => 'fas fa-briefcase',
                'harga' => 1500000,
                'status' => 'aktif',
            ],
            [
                'nama_layanan' => 'Pelatihan & Sertifikasi UMKM',
                'deskripsi' => 'Program peningkatan kapasitas SDM, sertifikasi kompetensi, dan workshop digital marketing.',
                'icon' => 'fas fa-graduation-cap',
                'harga' => 750000,
                'status' => 'aktif',
            ],
            [
                'nama_layanan' => 'Akselerasi Ekspor & Promosi',
                'deskripsi' => 'Fasilitasi temu bisnis (business matching), kurasi produk ekspor, dan pameran dagang internasional.',
                'icon' => 'fas fa-globe',
                'harga' => 2500000,
                'status' => 'aktif',
            ],
            [
                'nama_layanan' => 'Akses Permodalan & Kemitraan',
                'deskripsi' => 'Penghubung permodalan perbankan/fintech dan jaringan kemitraan rantai pasok industri.',
                'icon' => 'fas fa-handshake',
                'harga' => 0,
                'status' => 'aktif',
            ],
        ];

        foreach ($data as $item) {
            Layanan::create($item);
        }
    }
}
