<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MateriProgress extends Model
{
    protected $table = 'materi_progress';

    protected $fillable = [
        'user_id',
        'materi_id',
        'is_opened',
        'is_completed',
        'last_accessed_at',
        'completed_at'
    ];

    protected $casts = [
        'is_opened' => 'boolean',
        'is_completed' => 'boolean',
        'last_accessed_at' => 'datetime',
        'completed_at' => 'datetime',
    ];

    public function materi()
    {
        return $this->belongsTo(Materi::class, 'materi_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}