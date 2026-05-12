<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AssessmentSeeder extends Seeder
{
    public function run(): void
    {
        $quizzes = [
            [
                'title'        => 'Quiz Chapter 1 - About Me',
                'description'  => 'Quiz tentang perkenalan diri, salam, dan kata sifat untuk mendeskripsikan orang.',
                'duration'     => 15,
                'passing_score'=> 70,
                'is_active'    => 1,
                'deadline'     => now()->addDays(30),
            ],
            [
                'title'        => 'Quiz Chapter 2 - Culinary and Me',
                'description'  => 'Quiz tentang makanan, minuman, rasa, tekstur, dan simple present tense.',
                'duration'     => 15,
                'passing_score'=> 70,
                'is_active'    => 1,
                'deadline'     => now()->addDays(30),
            ],
            [
                'title'        => 'Quiz Chapter 3 - Home Sweet Home',
                'description'  => 'Quiz tentang ruangan, benda di rumah, there is/are, dan preposisi tempat.',
                'duration'     => 15,
                'passing_score'=> 70,
                'is_active'    => 1,
                'deadline'     => now()->addDays(30),
            ],
            [
                'title'        => 'Quiz Chapter 4 - My School Activities',
                'description'  => 'Quiz tentang mata pelajaran, waktu, rutinitas sekolah, dan kata keterangan frekuensi.',
                'duration'     => 15,
                'passing_score'=> 70,
                'is_active'    => 1,
                'deadline'     => now()->addDays(30),
            ],
            [
                'title'        => 'Quiz Chapter 5 - This is My School',
                'description'  => 'Quiz tentang fasilitas sekolah, ekstrakurikuler, peraturan sekolah, dan festival.',
                'duration'     => 15,
                'passing_score'=> 70,
                'is_active'    => 1,
                'deadline'     => now()->addDays(30),
            ],
        ];

        foreach ($quizzes as $quiz) {
            DB::table('assessments')->updateOrInsert(
                ['title' => $quiz['title']],
                array_merge($quiz, [
                    'created_at' => now(),
                    'updated_at' => now(),
                ])
            );
        }
    }
}