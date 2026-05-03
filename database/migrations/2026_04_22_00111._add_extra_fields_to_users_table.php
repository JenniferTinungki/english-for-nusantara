<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('username')->nullable()->unique()->after('nis');
            $table->string('kelas')->nullable()->after('username');
            $table->enum('jenis_kelamin', ['L', 'P'])->nullable()->after('kelas');
            $table->boolean('is_active')->default(true)->after('jenis_kelamin');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['username', 'kelas', 'jenis_kelamin', 'is_active']);
        });
    }
};