<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('materi', function (Blueprint $table) {
            $table->foreignId('guru_id')->nullable()->after('id')->constrained('users')->onDelete('cascade');
            $table->integer('urutan')->default(1)->after('bab');
            $table->boolean('is_active')->default(true)->after('durasi');
        });
    }

    public function down(): void
    {
        Schema::table('materi', function (Blueprint $table) {
            $table->dropConstrainedForeignId('guru_id');
            $table->dropColumn('urutan');
            $table->dropColumn('is_active');
        });
    }
};