<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TugasSubmit extends Model
{
    use HasFactory;

    protected $table = 'tugas_submit';

    public $timestamps = false;

    protected $fillable = [
        'tugas_id',
        'user_id',
        'file',
        'keterangan',
        'nilai',
    ];

    public function tugas()
    {
        return $this->belongsTo(Tugas::class, 'tugas_id');
    }

    public function siswa()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}