<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'nis',
        'username',
        'kelas',
        'jenis_kelamin',
        'is_active',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_active'         => 'boolean',
    ];

    /*
    |--------------------------------------------------------------------------
    | RELASI TUGAS
    |--------------------------------------------------------------------------
    */

    public function tugasSubmits()
    {
        return $this->hasMany(TugasSubmit::class, 'user_id');
    }

    /*
    |--------------------------------------------------------------------------
    | RELASI ASSESSMENT
    |--------------------------------------------------------------------------
    */

    public function createdAssessments()
    {
        return $this->hasMany(Assessment::class, 'created_by');
    }

    public function assessmentAttempts()
    {
        return $this->hasMany(AssessmentAttempt::class, 'user_id');
    }

    public function assessmentResults()
    {
        return $this->hasMany(AssessmentResult::class, 'user_id');
    }

    /*
    |--------------------------------------------------------------------------
    | RELASI PROGRESS MATERI
    |--------------------------------------------------------------------------
    */

    public function materiProgress()
    {
        return $this->hasMany(MateriProgress::class, 'user_id');
    }

    public function quizAttempts()
    {
        return $this->hasMany(QuizAttempt::class, 'user_id');
    }

    /*
    |--------------------------------------------------------------------------
    | ACCESSOR NILAI RATA-RATA
    |--------------------------------------------------------------------------
    */

    public function getNilaiRataRataAttribute(): float|null
    {
        // Menggunakan 'final_score' sesuai dengan kolom di tabel assessment_results
        $nilaiAssessment = $this->assessmentResults()->avg('final_score');
        $nilaiQuiz       = $this->quizAttempts()->avg('score');
        $nilaiTugas      = $this->tugasSubmits()->whereNotNull('nilai')->avg('nilai');

        $values = array_filter([
            $nilaiAssessment,
            $nilaiQuiz,
            $nilaiTugas,
        ], fn($v) => $v !== null);

        if (count($values) === 0) return null;

        return round(array_sum($values) / count($values), 1);
    }

    /*
    |--------------------------------------------------------------------------
    | ACCESSOR PROGRESS MATERI (%)
    |--------------------------------------------------------------------------
    */

    public function getProgressMateriAttribute(): int
    {
        $total     = \App\Models\Materi::count();
        $completed = $this->materiProgress()->where('is_completed', true)->count();

        if ($total === 0) return 0;

        return (int) round(($completed / $total) * 100);
    }
}