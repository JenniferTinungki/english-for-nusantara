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
                'judul_unit' => 'Chapter 0 - Introduction',
                'deskripsi' => 'Pengenalan aplikasi English for Nusantara dan dasar belajar bahasa Inggris.',
                'cover_image' => 'chapter0.jpg',
            ],

            [
                'judul_unit' => 'Chapter 1 - Greetings',
                'deskripsi' => 'Belajar salam formal dan informal, perkenalan diri, dan ekspresi umum.',
                'cover_image' => 'chapter1.jpg',
            ],

            [
                'judul_unit' => 'Chapter 2 - Numbers & Colors',
                'deskripsi' => 'Belajar angka, warna, dan cara menggunakannya dalam kalimat.',
                'cover_image' => 'chapter2.jpg',
            ],

            [
                'judul_unit' => 'Chapter 3 - Days & Months',
                'deskripsi' => 'Belajar nama hari, bulan, dan penggunaan tanggal.',
                'cover_image' => 'chapter3.jpg',
            ],

            [
                'judul_unit' => 'Chapter 4 - Family & Objects',
                'deskripsi' => 'Belajar anggota keluarga dan benda di sekitar.',
                'cover_image' => 'chapter4.jpg',
            ],

            [
                'judul_unit' => 'Chapter 5 - Daily Activities',
                'deskripsi' => 'Belajar aktivitas harian dan simple present tense.',
                'cover_image' => 'chapter5.jpg',
            ],

        ];

        foreach ($chapters as $chapter) {
            DB::table('units')->updateOrInsert(
                ['judul_unit' => $chapter['judul_unit']],
                [
                    'deskripsi' => $chapter['deskripsi'],
                    'cover_image' => $chapter['cover_image'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }
    }
}