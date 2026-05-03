<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssessmentAttempt extends Model
{
    protected $table = 'assessment_attempts';

    protected $fillable = [
        'assessment_id',
        'user_id',
        'score',
        'status',
        'started_at',
        'submitted_at',
        'attempt_number',
    ];

    protected $casts = [
        'started_at'   => 'datetime',
        'submitted_at' => 'datetime',
    ];

    public function assessment()
    {
        return $this->belongsTo(Assessment::class, 'assessment_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function answers()
    {
        return $this->hasMany(AssessmentAnswer::class, 'attempt_id');
    }
}