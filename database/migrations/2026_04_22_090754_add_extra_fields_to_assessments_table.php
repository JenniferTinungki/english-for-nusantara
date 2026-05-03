<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('assessments', function (Blueprint $table) {
            $table->dateTime('deadline')->nullable()->after('description');
            $table->integer('duration')->default(0)->after('deadline');
            $table->integer('passing_score')->default(75)->after('duration');
        });
    }

    public function down(): void
    {
        Schema::table('assessments', function (Blueprint $table) {
            $table->dropColumn(['deadline', 'duration', 'passing_score']);
        });
    }
};