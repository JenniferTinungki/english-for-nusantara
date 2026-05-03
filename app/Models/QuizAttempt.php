<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class QuizAttempt extends Model
{
    use HasFactory;

    protected $table = 'quiz_attempts';

    protected $fillable = [
        'quiz_id',
        'user_id',
        'score',
        'nilai',
        'correct_answers',
        'total_questions',
        'submitted_at',
        'finished_at',
    ];

    protected $casts = [
        'submitted_at' => 'datetime',
        'finished_at' => 'datetime',
    ];

    public function quiz()
    {
        return $this->belongsTo(Quiz::class, 'quiz_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function siswa()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getDisplayScoreAttribute()
    {
        if (!is_null($this->score)) {
            return $this->score;
        }

        if (!is_null($this->nilai)) {
            return $this->nilai;
        }

        return 0;
    }
}