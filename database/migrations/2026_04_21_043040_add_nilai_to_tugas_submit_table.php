<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasColumn('tugas_submit', 'nilai')) {
            Schema::table('tugas_submit', function (Blueprint $table) {
                $table->integer('nilai')->nullable();
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('tugas_submit', 'nilai')) {
            Schema::table('tugas_submit', function (Blueprint $table) {
                $table->dropColumn('nilai');
            });
        }
    }
};