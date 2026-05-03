<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Assessment;
use App\Models\Materi;
use App\Models\Tugas;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $user = Auth::user();

        // Total materi yang tersedia
        $totalMateri = Materi::count();

        // Quiz yang sudah diselesaikan oleh siswa ini
        $quizSelesai = 0; // Sesuaikan dengan model QuizResult/QuizAnswer Anda

        // Total tugas aktif
        $totalTugas = Tugas::where('is_active', true)->count();

        // Total assessment
        $totalAssessment = Assessment::count();

        // Progress persen (0-100)
        $progressPersen = 0; // Sesuaikan dengan logika progress Anda

        // Materi terbaru
        $materiTerbaru = Materi::latest()->first();

        // 5 tugas terbaru yang aktif
        $tugasTerbaru = Tugas::where('is_active', true)
                             ->latest()
                             ->take(5)
                             ->get();

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