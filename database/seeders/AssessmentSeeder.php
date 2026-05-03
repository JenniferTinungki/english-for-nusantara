<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AssessmentSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('assessments')->insert([
            [
                'title' => 'Quiz Unit 1 - Greetings',
                'description' => 'Quiz tentang greeting expressions.',
                'duration' => 15,
                'passing_score' => 70,
                'is_active' => 1,
                'deadline' => now()->addDays(30),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Quiz Unit 2 - Daily Activities',
                'description' => 'Quiz tentang aktivitas harian.',
                'duration' => 20,
                'passing_score' => 70,
                'is_active' => 1,
                'deadline' => now()->addDays(30),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}