<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class SubMateri extends Model
{
    protected $table = 'sub_materi';
    protected $fillable = [
        'materi_id',
        'judul',
        'deskripsi',
        'tipe',
        'icon',
        'urutan',
    ];
    public function materi()
    {
        return $this->belongsTo(Materi::class, 'materi_id');
    }
    public function detailItems()
    {
        return $this->hasMany(IsiMateriDetail::class, 'sub_materi_id')
            ->orderBy('urutan', 'asc')
            ->orderBy('id', 'asc');
    }
    public function isiDetail()
    {
        return $this->hasMany(IsiMateriDetail::class, 'sub_materi_id')
            ->orderBy('urutan', 'asc')
            ->orderBy('id', 'asc');
    }
}