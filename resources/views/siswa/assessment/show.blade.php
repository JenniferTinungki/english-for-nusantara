@extends('layouts.app')

@section('content')
<div class="container py-4">
    @if(session('error'))
        <div class="alert alert-danger border-0 shadow-sm rounded-4 mb-4 px-4 py-3">
            {{ session('error') }}
        </div>
    @endif

    <div class="assessment-show-page">
        <div class="show-shell">
            <div class="show-hero">
                <div class="row align-items-center g-4">
                    <div class="col-lg-8">
                        <span class="show-chip">Assessment</span>
                        <h1 class="show-title">{{ $assessment->title }}</h1>
                        <p class="show-subtitle mb-0">
                            Kerjakan semua soal dengan teliti. Pastikan jawaban sudah benar sebelum dikirim.
                        </p>
                    </div>

                    <div class="col-lg-4">
                        <div class="hero-side-card">
                            <div class="hero-side-label">Jumlah Soal</div>
                            <div class="hero-side-value">{{ $assessment->questions->count() }}</div>
                            <div class="hero-side-caption">soal tersedia</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="show-info">
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="info-card">
                            <div class="info-label">Deskripsi</div>
                            <div class="info-text">
                                {{ $assessment->description ?: 'Tidak ada deskripsi assessment.' }}
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="info-card">
                            <div class="info-label">Status Pengerjaan</div>

                            @if($latestAttempt)
                                <div class="status-wrap mb-2">
                                    <span class="status-pill status-success">Sudah Pernah Dikerjakan</span>
                                </div>
                                <div class="info-text">
                                    Nilai terakhir kamu:
                                    <span class="highlight-score">{{ $latestAttempt->score }}</span>
                                </div>
                            @else
                                <div class="status-wrap mb-2">
                                    <span class="status-pill status-neutral">Belum Dikerjakan</span>
                                </div>
                                <div class="info-text">
                                    Kamu belum pernah mengerjakan assessment ini.
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <form method="POST" action="{{ route('siswa.assessment.submit', $assessment->id) }}">
                @csrf

                <div class="questions-section">
                    <div class="section-head">
                        <div>
                            <h3 class="section-title">Daftar Soal</h3>
                            <p class="section-subtitle">Pilih satu jawaban terbaik untuk setiap pertanyaan.</p>
                        </div>

                        <a href="{{ route('siswa.assessment.index') }}" class="btn btn-outline-primary rounded-pill px-4">
                            Kembali
                        </a>
                    </div>

                    @forelse($assessment->questions as $index => $question)
    <div class="question-card">
        <div class="question-top">
            <div class="question-left">
                <div class="question-number">{{ $index + 1 }}</div>
                <div>
                    <div class="question-title">{{ $question->question }}</div>
                    <div class="question-meta">
                        @if(($question->type ?? 'pilihan_ganda') === 'essay')
                            <span class="badge bg-warning text-dark">Essay</span>
                        @else
                            <span class="badge bg-primary">Pilihan Ganda</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        @if(($question->type ?? 'pilihan_ganda') === 'essay')
            <div class="mt-3">
                <textarea
                    name="essay[{{ $question->id }}]"
                    rows="4"
                    class="form-control rounded-3"
                    placeholder="Tulis jawaban essay kamu di sini...">{{ old("essay.{$question->id}") }}</textarea>
            </div>
        @else
            <div class="options-grid">
                @foreach(['A', 'B', 'C', 'D'] as $option)
                    @php
                        $field = 'option_' . strtolower($option);
                        $inputId = 'q' . $question->id . $option;
                    @endphp
                    <div class="option-item">
                        <input
                            class="option-input"
                            type="radio"
                            name="answers[{{ $question->id }}]"
                            id="{{ $inputId }}"
                            value="{{ $option }}"
                            {{ old("answers.{$question->id}") === $option ? 'checked' : '' }}
                        >
                        <label class="option-label" for="{{ $inputId }}">
                            <span class="option-badge">{{ $option }}</span>
                            <span class="option-text">{{ $question->$field }}</span>
                        </label>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@empty
    <div class="empty-card">
      Assessment ini belum memiliki soal.
    </div>
@endforelse
                               
                    @if($assessment->questions->count() > 0)
                        <div class="submit-panel">
                            <div class="submit-panel-inner">
                                <div>
                                    <h4 class="submit-title">Sudah selesai mengerjakan?</h4>
                                    <p class="submit-subtitle mb-0">
                                        Periksa kembali jawabanmu sebelum mengirim assessment.
                                    </p>
                                </div>

                                <div class="submit-actions">
                                    <a href="{{ route('siswa.assessment.index') }}" class="btn btn-light rounded-pill px-4">
                                        Batal
                                    </a>
                                    <button type="submit" class="btn btn-primary rounded-pill px-4 py-2">
                                        Kirim Assessment
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    .assessment-show-page {
        padding-bottom: 12px;
    }

    .show-shell {
        background: #ffffff;
        border-radius: 28px;
        overflow: hidden;
        box-shadow: 0 18px 45px rgba(15, 23, 42, 0.08);
        border: 1px solid rgba(226, 232, 240, 0.9);
    }

    .show-hero {
        padding: 32px;
        background:
            radial-gradient(circle at top right, rgba(255,255,255,0.18), transparent 30%),
            linear-gradient(135deg, #1d4ed8 0%, #2563eb 45%, #3b82f6 100%);
        color: #ffffff;
    }

    .show-chip {
        display: inline-block;
        font-size: 13px;
        font-weight: 700;
        letter-spacing: .04em;
        text-transform: uppercase;
        background: rgba(255,255,255,0.16);
        border: 1px solid rgba(255,255,255,0.18);
        padding: 8px 14px;
        border-radius: 999px;
        margin-bottom: 14px;
        backdrop-filter: blur(8px);
    }

    .show-title {
        font-size: 34px;
        font-weight: 800;
        line-height: 1.15;
        margin-bottom: 10px;
        color: #ffffff;
    }

    .show-subtitle {
        max-width: 700px;
        color: rgba(255,255,255,0.85);
        font-size: 15px;
        line-height: 1.7;
    }

    .hero-side-card {
        background: rgba(255,255,255,0.14);
        border: 1px solid rgba(255,255,255,0.2);
        border-radius: 24px;
        padding: 24px;
        text-align: center;
        backdrop-filter: blur(10px);
        box-shadow: inset 0 1px 0 rgba(255,255,255,0.1);
    }

    .hero-side-label {
        color: rgba(255,255,255,0.8);
        font-size: 13px;
        font-weight: 600;
        margin-bottom: 8px;
    }

    .hero-side-value {
        font-size: 52px;
        line-height: 1;
        font-weight: 800;
        color: #ffffff;
        margin-bottom: 8px;
    }

    .hero-side-caption {
        color: rgba(255,255,255,0.75);
        font-size: 13px;
    }

    .show-info {
        padding: 24px 32px 8px 32px;
        background: #f8fafc;
        border-bottom: 1px solid #e2e8f0;
    }

    .info-card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 20px;
        padding: 20px;
        height: 100%;
        box-shadow: 0 8px 20px rgba(15, 23, 42, 0.04);
    }

    .info-label {
        font-size: 13px;
        color: #64748b;
        margin-bottom: 10px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: .04em;
    }

    .info-text {
        font-size: 16px;
        color: #0f172a;
        line-height: 1.7;
    }

    .status-wrap {
        display: flex;
        align-items: center;
    }

    .status-pill {
        display: inline-flex;
        align-items: center;
        padding: 10px 16px;
        border-radius: 999px;
        font-size: 14px;
        font-weight: 700;
    }

    .status-success {
        background: #dcfce7;
        color: #166534;
    }

    .status-neutral {
        background: #e2e8f0;
        color: #334155;
    }

    .highlight-score {
        display: inline-block;
        margin-left: 6px;
        font-weight: 800;
        color: #2563eb;
        font-size: 24px;
        line-height: 1;
    }

    .questions-section {
        padding: 32px;
        background: #ffffff;
    }

    .section-head {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 16px;
        flex-wrap: wrap;
        margin-bottom: 24px;
    }

    .section-title {
        font-size: 24px;
        font-weight: 800;
        color: #0f172a;
        margin-bottom: 6px;
    }

    .section-subtitle {
        color: #64748b;
        margin-bottom: 0;
        font-size: 14px;
    }

    .question-card {
        background: linear-gradient(180deg, #ffffff 0%, #f8fafc 100%);
        border: 1px solid #e2e8f0;
        border-radius: 24px;
        padding: 24px;
        margin-bottom: 18px;
        box-shadow: 0 10px 28px rgba(15, 23, 42, 0.05);
    }

    .question-top {
        margin-bottom: 18px;
    }

    .question-left {
        display: flex;
        align-items: flex-start;
        gap: 14px;
    }

    .question-number {
        width: 46px;
        height: 46px;
        min-width: 46px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #2563eb, #3b82f6);
        color: #ffffff;
        font-weight: 800;
        box-shadow: 0 8px 18px rgba(37, 99, 235, 0.25);
    }

    .question-title {
        font-size: 20px;
        font-weight: 700;
        color: #0f172a;
        line-height: 1.5;
        margin-bottom: 4px;
    }

    .question-meta {
        font-size: 13px;
        color: #64748b;
    }

    .options-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 14px;
    }

    .option-item {
        position: relative;
    }

    .option-input {
        position: absolute;
        opacity: 0;
        pointer-events: none;
    }

    .option-label {
        display: flex;
        align-items: center;
        gap: 14px;
        border: 1px solid #dbe4f0;
        background: #ffffff;
        border-radius: 18px;
        padding: 16px 18px;
        cursor: pointer;
        transition: all .2s ease;
        min-height: 76px;
        box-shadow: 0 6px 18px rgba(15, 23, 42, 0.03);
    }

    .option-label:hover {
        border-color: #93c5fd;
        transform: translateY(-1px);
        box-shadow: 0 10px 24px rgba(37, 99, 235, 0.08);
    }

    .option-input:checked + .option-label {
        border-color: #2563eb;
        background: #eff6ff;
        box-shadow: 0 10px 24px rgba(37, 99, 235, 0.12);
    }

    .option-badge {
        width: 38px;
        height: 38px;
        min-width: 38px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #e2e8f0;
        color: #0f172a;
        font-weight: 800;
        transition: all .2s ease;
    }

    .option-input:checked + .option-label .option-badge {
        background: linear-gradient(135deg, #2563eb, #3b82f6);
        color: #ffffff;
        box-shadow: 0 8px 18px rgba(37, 99, 235, 0.22);
    }

    .option-text {
        font-size: 16px;
        font-weight: 600;
        color: #0f172a;
        line-height: 1.5;
    }

    .submit-panel {
        margin-top: 28px;
    }

    .submit-panel-inner {
        background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%);
        border-radius: 24px;
        padding: 24px;
        color: #ffffff;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
        flex-wrap: wrap;
        box-shadow: 0 18px 35px rgba(15, 23, 42, 0.18);
    }

    .submit-title {
        font-size: 22px;
        font-weight: 800;
        margin-bottom: 6px;
        color: #ffffff;
    }

    .submit-subtitle {
        color: rgba(255,255,255,0.75);
        font-size: 14px;
    }

    .submit-actions {
        display: flex;
        gap: 12px;
        flex-wrap: wrap;
    }

    .empty-card {
        border: 1px dashed #cbd5e1;
        background: #f8fafc;
        border-radius: 20px;
        padding: 24px;
        color: #64748b;
        text-align: center;
    }

    @media (max-width: 991.98px) {
        .show-title {
            font-size: 28px;
        }

        .hero-side-value {
            font-size: 44px;
        }

        .options-grid {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 767.98px) {
        .show-hero,
        .show-info,
        .questions-section {
            padding-left: 20px;
            padding-right: 20px;
        }

        .show-title {
            font-size: 24px;
        }

        .section-title {
            font-size: 20px;
        }

        .question-title {
            font-size: 18px;
        }

        .submit-panel-inner {
            padding: 20px;
        }
    }
</style>
@endsection
