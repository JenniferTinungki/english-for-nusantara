<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnitSeeder extends Seeder
{
    public function run(): void
    {
        $chapters = [
            [
                'judul_unit' => 'Chapter 0 - The Beginning',
                'deskripsi' => 'Pengenalan dasar bahasa Inggris: alfabet, angka, hari, bulan, warna, dan keluarga.',
                'cover_image' => 'chapter0.jpg',
            ],
            [
                'judul_unit' => 'Chapter 1 - About Me',
                'deskripsi' => 'Belajar memperkenalkan diri, menyapa, dan berbicara tentang diri sendiri dan teman.',
                'cover_image' => 'chapter1.jpg',
            ],
            [
                'judul_unit' => 'Chapter 2 - Culinary and Me',
                'deskripsi' => 'Belajar mendeskripsikan makanan dan minuman favorit, rasa, dan tekstur.',
                'cover_image' => 'chapter2.jpg',
            ],
            [
                'judul_unit' => 'Chapter 3 - Home Sweet Home',
                'deskripsi' => 'Belajar mendeskripsikan rumah, ruangan, benda di rumah, dan pekerjaan rumah tangga.',
                'cover_image' => 'chapter3.jpg',
            ],
            [
                'judul_unit' => 'Chapter 4 - My School Activities',
                'deskripsi' => 'Belajar tentang jadwal sekolah, kelas online, dan kebiasaan belajar.',
                'cover_image' => 'chapter4.jpg',
            ],
            [
                'judul_unit' => 'Chapter 5 - This is My School',
                'deskripsi' => 'Belajar mendeskripsikan gedung sekolah, kegiatan ekstrakurikuler, dan festival sekolah.',
                'cover_image' => 'chapter5.jpg',
            ],
        ];

        foreach ($chapters as $chapter) {
            DB::table('units')->updateOrInsert(
                ['judul_unit' => $chapter['judul_unit']],
                [
                    'deskripsi'   => $chapter['deskripsi'],
                    'cover_image' => $chapter['cover_image'],
                    'created_at'  => now(),
                    'updated_at'  => now(),
                ]
            );
        }
    }
}