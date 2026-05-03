<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('materi', function (Blueprint $table) {

            $table->id();
            $table->integer('bab');
            $table->string('judul');
            $table->string('subjudul')->nullable();
            $table->text('deskripsi')->nullable();
            $table->longText('isi_materi')->nullable();
            $table->string('video')->nullable();
            $table->string('audio')->nullable();
            $table->string('gambar')->nullable();
            $table->integer('durasi')->nullable();
            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('materi');
    }
};