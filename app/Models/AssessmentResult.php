<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssessmentResult extends Model
{
    protected $fillable = [
        'assessment_id',
        'user_id',
        'best_attempt_id',
        'final_score',
        'total_questions',
        'correct_answers',
        'wrong_answers',
        'unanswered',
        'passed',
        'status',
        'completed_at',
    ];

    protected $casts = [
        'passed' => 'boolean',
        'completed_at' => 'datetime',
    ];

    public function assessment()
    {
        return $this->belongsTo(Assessment::class, 'assessment_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function bestAttempt()
    {
        return $this->belongsTo(AssessmentAttempt::class, 'best_attempt_id');
    }
}