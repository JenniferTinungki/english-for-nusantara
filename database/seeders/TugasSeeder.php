<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TugasSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tugas')->insert([
            [
                'judul' => 'Tugas Perkenalan Diri',
                'deskripsi' => 'Buat paragraf singkat perkenalan diri dalam bahasa Inggris.',
                'deadline' => now()->addDays(14),
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Daily Activity Journal',
                'deskripsi' => 'Tuliskan aktivitas harianmu dalam bahasa Inggris.',
                'deadline' => now()->addDays(14),
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}