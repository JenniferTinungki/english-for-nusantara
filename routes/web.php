<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\MateriController as AdminMateriController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\QuizEvaluasiController as AdminQuizEvaluasiController;
use App\Http\Controllers\Admin\LaporanController as LaporanController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Guru\AssessmentController as GuruAssessmentController;
use App\Http\Controllers\Guru\AssessmentQuestionController as GuruAssessmentQuestionController;
use App\Http\Controllers\Guru\DashboardController as GuruDashboardController;
use App\Http\Controllers\Guru\MateriController as GuruMateriController;
use App\Http\Controllers\Guru\MonitoringProgressController as GuruMonitoringProgressController;
use App\Http\Controllers\Guru\PenilaianController as GuruPenilaianController;
use App\Http\Controllers\Guru\QuizController as GuruQuizController;
use App\Http\Controllers\Guru\QuizQuestionController as GuruQuizQuestionController;
use App\Http\Controllers\Guru\TugasController as GuruTugasController;
use App\Http\Controllers\Guru\SiswaController as GuruSiswaController;
use App\Http\Controllers\Siswa\AssessmentController as SiswaAssessmentController;
use App\Http\Controllers\Siswa\DashboardController as SiswaDashboardController;
use App\Http\Controllers\Siswa\MateriController as SiswaMateriController;
use App\Http\Controllers\Siswa\ProgressController as SiswaProgressController;
use App\Http\Controllers\Siswa\QuizController as SiswaQuizController;
use App\Http\Controllers\Siswa\TugasController as SiswaTugasController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'landing')->name('landing');

Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login.post');
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->middleware('auth')->name('logout');

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {

    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    Route::resource('/materi', AdminMateriController::class);

    Route::resource('/users', AdminUserController::class);
    Route::patch('/users/{user}/toggle-status', [AdminUserController::class, 'toggleStatus'])->name('users.toggle-status');

    Route::prefix('quiz-evaluasi')->name('quiz-evaluasi.')->group(function () {
        Route::get('/', [AdminQuizEvaluasiController::class, 'index'])->name('index');
        Route::get('/hasil', [AdminQuizEvaluasiController::class, 'hasil'])->name('hasil');
        Route::get('/leaderboard', [AdminQuizEvaluasiController::class, 'leaderboard'])->name('leaderboard');
        Route::get('/{id}', [AdminQuizEvaluasiController::class, 'show'])->name('show');
    });

    Route::prefix('laporan')->name('laporan.')->group(function () {
        Route::get('/', [LaporanController::class, 'index'])->name('index');
        Route::get('/export-excel', [LaporanController::class, 'exportExcel'])->name('export.excel');
    });
});

Route::middleware('auth')->prefix('guru')->name('guru.')->group(function () {

    Route::get('/dashboard', [GuruDashboardController::class, 'index'])->name('dashboard');

    Route::controller(GuruMateriController::class)->prefix('materi')->name('materi.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{materi}', 'show')->name('show');
        Route::get('/{materi}/edit', 'edit')->name('edit');
        Route::put('/{materi}', 'update')->name('update');
        Route::delete('/{materi}', 'destroy')->name('destroy');
        Route::post('/{materi}/sub', 'subStore')->name('sub.store');
        Route::put('/{materi}/sub/{subId}', 'subUpdate')->name('sub.update');
        Route::delete('/{materi}/sub/{subId}', 'subDestroy')->name('sub.destroy');
        Route::post('/{materi}/sub/{subId}/detail', 'detailStore')->name('detail.store');
        Route::delete('/{materi}/sub/{subId}/detail/{detailId}', 'detailDestroy')->name('detail.destroy');
    });

    Route::controller(GuruTugasController::class)->prefix('tugas')->name('tugas.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{id}', 'show')->name('show');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::put('/{id}', 'update')->name('update');
        Route::delete('/{id}', 'destroy')->name('destroy');
    });

    Route::post('/tugas-submit/{id}/nilai', [GuruTugasController::class, 'nilai'])->name('tugas.nilai');

    Route::controller(GuruQuizController::class)->prefix('quiz')->name('quiz.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{id}', 'show')->name('show');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::put('/{id}', 'update')->name('update');
        Route::delete('/{id}', 'destroy')->name('destroy');
    });

    Route::controller(GuruQuizQuestionController::class)->prefix('quiz/{quizId}/questions')->name('quiz.questions.')->group(function () {
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::put('/{id}', 'update')->name('update');
        Route::delete('/{id}', 'destroy')->name('destroy');
    });

    Route::controller(GuruAssessmentController::class)->prefix('assessment')->name('assessment.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{id}', 'show')->name('show');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::put('/{id}', 'update')->name('update');
        Route::delete('/{id}', 'destroy')->name('destroy');
        Route::get('/{id}/essay', 'essayList')->name('essay.list');
        Route::post('/{id}/essay/nilai', 'essayNilai')->name('essay.nilai');
    });

    Route::controller(GuruAssessmentQuestionController::class)->prefix('assessment/{assessmentId}/questions')->name('assessment.questions.')->group(function () {
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::put('/{id}', 'update')->name('update');
        Route::delete('/{id}', 'destroy')->name('destroy');
    });

    Route::controller(GuruSiswaController::class)->prefix('siswa')->name('siswa.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{id}', 'show')->name('show');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::put('/{id}', 'update')->name('update');
        Route::delete('/{id}', 'destroy')->name('destroy');
    });

    Route::get('/penilaian', [GuruPenilaianController::class, 'index'])->name('penilaian.index');
    Route::get('/progress', [GuruMonitoringProgressController::class, 'index'])->name('progress.index');
});

Route::middleware('auth')->prefix('siswa')->name('siswa.')->group(function () {

    Route::get('/dashboard', [SiswaDashboardController::class, 'index'])->name('dashboard');

    Route::controller(SiswaMateriController::class)->prefix('materi')->name('materi.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/{id}', 'show')->name('show');
        Route::post('/{id}/opened', 'markOpened')->name('opened');
        Route::post('/{id}/completed', 'markCompleted')->name('completed');
        Route::post('/{materiId}/sub/{subId}/opened', 'markSubOpened')->name('sub.opened');
        Route::post('/{materiId}/sub/{subId}/completed', 'markSubCompleted')->name('sub.completed');
        Route::post('/feedback', 'feedback')->name('feedback');
    });

    Route::controller(SiswaQuizController::class)->prefix('quiz')->name('quiz.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/result/{attemptId}', 'result')->name('result');
        Route::get('/{id}/leaderboard', 'leaderboard')->name('leaderboard');
        Route::get('/{id}', 'show')->name('show');
        Route::post('/{id}/submit', 'submit')->name('submit');
    });

    Route::controller(SiswaTugasController::class)->prefix('tugas')->name('tugas.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/{id}', 'show')->name('show');
        Route::post('/{id}/submit', 'submit')->name('submit');
    });

    Route::controller(SiswaAssessmentController::class)->prefix('assessment')->name('assessment.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/result/{attemptId}', 'result')->name('result');
        Route::get('/{id}', 'show')->name('show');
        Route::post('/{id}/submit', 'submit')->name('submit');
    });

    Route::get('/progress', [SiswaProgressController::class, 'index'])->name('progress.index');
});
require __DIR__.'/auth.php';
