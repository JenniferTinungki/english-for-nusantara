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
                'time_limit' => 15,
                'passing_score' => 70,
                'status' => 'published',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Quiz Unit 2 - Daily Activities',
                'description' => 'Quiz tentang aktivitas harian.',
                'time_limit' => 20,
                'passing_score' => 70,
                'status' => 'published',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}