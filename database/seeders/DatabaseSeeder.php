<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            UnitSeeder::class,
            MateriSeeder::class,
            TugasSeeder::class,
            AssessmentSeeder::class,
            AssessmentQuestionSeeder::class,
        ]);
    }
}