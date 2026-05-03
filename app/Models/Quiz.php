<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Quiz extends Model
{
    use HasFactory;

    protected $table = 'quizzes';

    protected $fillable = [
        'guru_id',
        'judul',
        'deskripsi',
        'tipe',
        'is_active',
        'chapter',
    ];

    public function questions()
    {
        return $this->hasMany(QuizQuestion::class, 'quiz_id');
    }

    public function attempts()
    {
        return $this->hasMany(QuizAttempt::class, 'quiz_id');
    }

    public function getDisplayTitleAttribute(): string
    {
        return $this->judul ?: 'Tanpa Judul';
    }

    public function getDisplayDescriptionAttribute(): string
    {
        return $this->deskripsi ?: '-';
    }

    public function getDisplayChapterAttribute()
    {
        return $this->chapter ?? '-';
    }
}