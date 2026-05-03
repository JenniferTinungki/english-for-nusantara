<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MateriSection extends Model
{
    protected $table = 'materi_sections';

    protected $fillable = [
        'materi_id',
        'title',
        'type',
        'content',
        'audio',
        'icon',
        'urutan',
    ];

    public function materi()
    {
        return $this->belongsTo(Materi::class, 'materi_id');
    }
}