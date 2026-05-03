<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IsiMateriDetail extends Model
{
    protected $table = 'isi_materi_detail';

    protected $fillable = [
        'sub_materi_id',
        'label',
        'nilai',
        'arti',
        'warna',
        'audio',
        'urutan',
    ];

    public function subMateri()
    {
        return $this->belongsTo(SubMateri::class, 'sub_materi_id');
    }
}