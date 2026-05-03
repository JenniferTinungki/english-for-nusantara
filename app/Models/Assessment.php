<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    protected $fillable = [
        'title',
        'description',
        'materi_id',
        'created_by',
        'deadline',
        'duration',
        'passing_score',
        'shuffle_questions',
        'shuffle_answers',
        'show_result_immediately',
        'is_active',
    ];

    protected $casts = [
        'deadline' => 'datetime',
        'shuffle_questions' => 'boolean',
        'shuffle_answers' => 'boolean',
        'show_result_immediately' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function materi()
    {
        return $this->belongsTo(Materi::class, 'materi_id');
    }

    public function questions()
    {
        return $this->hasMany(AssessmentQuestion::class, 'assessment_id');
    }

    public function attempts()
    {
        return $this->hasMany(AssessmentAttempt::class, 'assessment_id');
    }

    public function results()
    {
        return $this->hasMany(AssessmentResult::class, 'assessment_id');
    }
}