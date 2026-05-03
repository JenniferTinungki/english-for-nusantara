<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    protected $table = 'materi';

    protected $fillable = [
        'bab',
        'judul',
        'subjudul',
        'deskripsi',
        'isi_materi',
        'gambar',
        'video',
        'durasi',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function subMateri()
    {
        return $this->hasMany(SubMateri::class, 'materi_id')
            ->orderBy('id', 'asc');
    }

    public function progress()
    {
        return $this->hasMany(MateriProgress::class, 'materi_id');
    }

    /*
    |--------------------------------------------------------------------------
    | RELASI ASSESSMENT
    |--------------------------------------------------------------------------
    */

    public function assessments()
    {
        return $this->hasMany(Assessment::class, 'materi_id');
    }
}