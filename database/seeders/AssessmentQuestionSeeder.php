<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AssessmentQuestionSeeder extends Seeder
{
    public function run(): void
    {
        $quiz = DB::table('assessments')
            ->where('title', 'Quiz Unit 1 - Greetings')
            ->first();

        if (!$quiz) return;

        DB::table('assessment_questions')->insert([
            [
                'assessment_id' => $quiz->id,
                'question' => 'What is the correct greeting in the morning?',
                'option_a' => 'Good night',
                'option_b' => 'Good morning',
                'option_c' => 'Bye',
                'option_d' => 'See you',
                'correct_answer' => 'B',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'assessment_id' => $quiz->id,
                'question' => 'Which one is informal greeting?',
                'option_a' => 'Hi',
                'option_b' => 'Good evening',
                'option_c' => 'How do you do',
                'option_d' => 'Good afternoon',
                'correct_answer' => 'A',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}