<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Materi;
use App\Models\Tugas;
use App\Models\TugasSubmit;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;

class DashboardController extends Controller
{
    public function index()
    {
        $guruId = Auth::id();

        $totalMateri = Schema::hasColumn('materi', 'guru_id')
            ? Materi::where('guru_id', $guruId)->count()
            : Materi::count();

        $totalTugas = Schema::hasColumn('tugas', 'guru_id')
            ? Tugas::where('guru_id', $guruId)->count()
            : Tugas::count();

        $totalSubmit = 0;
        $sudahDinilai = 0;

        if (Schema::hasTable('tugas_submit') && Schema::hasColumn('tugas', 'guru_id')) {
            $totalSubmit = TugasSubmit::whereHas('tugas', function ($query) use ($guruId) {
                $query->where('guru_id', $guruId);
            })->count();

            $sudahDinilai = TugasSubmit::whereHas('tugas', function ($query) use ($guruId) {
                $query->where('guru_id', $guruId);
            })->whereNotNull('nilai')->count();
        }

        $totalSiswa = User::where('role', 'siswa')->count();

        $tugasTerbaru = Schema::hasColumn('tugas', 'guru_id')
            ? Tugas::where('guru_id', $guruId)->latest()->take(5)->get()
            : Tugas::latest()->take(5)->get();

        return view('guru.dashboard', compact(
            'totalMateri',
            'totalTugas',
            'totalSubmit',
            'sudahDinilai',
            'totalSiswa',
            'tugasTerbaru'
        ));
    }
}