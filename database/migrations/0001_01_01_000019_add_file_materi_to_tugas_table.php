<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('tugas') && !Schema::hasColumn('tugas', 'file_materi')) {
            Schema::table('tugas', function (Blueprint $table) {
                $table->string('file_materi')->nullable();
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('tugas') && Schema::hasColumn('tugas', 'file_materi')) {
            Schema::table('tugas', function (Blueprint $table) {
                $table->dropColumn('file_materi');
            });
        }
    }
};