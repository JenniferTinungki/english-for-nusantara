<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Assessment;
use App\Models\Materi;
use App\Models\Tugas;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $totalMateri = Materi::count();
        $quizSelesai = 0;
        $totalTugas = Tugas::where('is_active', true)->count();
        $totalAssessment = Assessment::count();
        $progressPersen = 0;
        $materiTerbaru = Materi::latest()->first();
        $tugasTerbaru = Tugas::where('is_active', true)->latest()->take(5)->get();

        return view('siswa.dashboard', compact(
            'totalMateri',
            'quizSelesai',
            'totalTugas',
            'totalAssessment',
            'progressPersen',
            'materiTerbaru',
            'tugasTerbaru'
        ));
    }
}