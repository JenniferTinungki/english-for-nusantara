<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tugas extends Model
{
    use HasFactory;

    protected $table = 'tugas';

    protected $fillable = [
        'guru_id',
        'judul',
        'deskripsi',
        'deadline',
        'file_materi',
        'is_active',
    ];

    protected $casts = [
        'deadline' => 'datetime',
    ];

    public function submits()
    {
        return $this->hasMany(TugasSubmit::class);
    }
}