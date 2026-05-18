<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssessmentEssayAnswer extends Model
{
    protected $table = 'assessment_essay_answers';

    protected $fillable = [
        'assessment_id',
        'user_id',
        'question_id',
        'jawaban',
        'nilai',
        'feedback',
    ];

    public function assessment()
    {
        return $this->belongsTo(Assessment::class, 'assessment_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function question()
    {
        return $this->belongsTo(AssessmentQuestion::class, 'question_id');
    }
}
