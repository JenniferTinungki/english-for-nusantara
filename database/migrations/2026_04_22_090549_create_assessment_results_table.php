<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('assessment_results')) {
            return;
        }

        Schema::create('assessment_results', function (Blueprint $table) {
            $table->id();

            $table->foreignId('assessment_id')
                ->constrained('assessments')
                ->cascadeOnDelete();

            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->foreignId('best_attempt_id')
                ->nullable()
                ->constrained('assessment_attempts')
                ->nullOnDelete();

            $table->integer('final_score')->default(0);
            $table->integer('total_questions')->default(0);
            $table->integer('correct_answers')->default(0);
            $table->integer('wrong_answers')->default(0);
            $table->integer('unanswered')->default(0);

            $table->boolean('passed')->default(false);

            $table->enum('status', ['not_started', 'in_progress', 'completed'])
                ->default('not_started');

            $table->dateTime('completed_at')->nullable();

            $table->timestamps();

            $table->unique(['assessment_id', 'user_id']);
            $table->index(['assessment_id', 'final_score']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('assessment_results');
    }
};