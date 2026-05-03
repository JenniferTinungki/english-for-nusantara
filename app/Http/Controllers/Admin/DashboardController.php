<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Materi;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalSiswa = User::where('role', 'siswa')->count();
        $totalGuru = User::where('role', 'guru')->count();
        $totalMateri = Materi::count();

        // pakai assessments sebagai quiz
        $totalQuiz = DB::table('assessments')->count();

        $materiTerbaru = Materi::latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalSiswa',
            'totalGuru',
            'totalMateri',
            'totalQuiz',
            'materiTerbaru'
        ));
    }
}