<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubMateriProgress extends Model
{
    protected $table = 'sub_materi_progress';

    protected $fillable = [
        'user_id',
        'materi_id',
        'sub_materi_id',
        'is_opened',
        'is_completed',
        'last_accessed_at',
        'completed_at',
    ];

    protected $casts = [
        'is_opened' => 'boolean',
        'is_completed' => 'boolean',
        'last_accessed_at' => 'datetime',
        'completed_at' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function materi(): BelongsTo
    {
        return $this->belongsTo(Materi::class, 'materi_id');
    }

    public function subMateri(): BelongsTo
    {
        return $this->belongsTo(SubMateri::class, 'sub_materi_id');
    }
}