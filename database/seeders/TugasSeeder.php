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
                'title' => 'Tugas Perkenalan Diri',
                'description' => 'Buat paragraf singkat perkenalan diri dalam bahasa Inggris.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Daily Activity Journal',
                'description' => 'Tuliskan aktivitas harianmu dalam bahasa Inggris.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}