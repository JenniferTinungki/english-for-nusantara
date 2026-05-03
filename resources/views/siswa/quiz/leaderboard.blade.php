@extends('layouts.app')

@section('title', 'Leaderboard Quiz')

@section('content')
<div class="container-fluid py-4 px-3">
    <style>
        :root{
            --bg:#f4f7fb;
            --card:#ffffff;
            --line:#e7edf5;
            --text:#16213e;
            --muted:#74839a;
            --blue:#2563eb;
        }

        body{ background:var(--bg); }

        .leader-shell{
            max-width:1100px;
            margin:0 auto;
        }

        .hero{
            background: linear-gradient(135deg, #08245f 0%, #0a2e7b 45%, #123da0 100%);
            border-radius:24px;
            padding:20px;
            color:#fff;
            box-shadow: 0 18px 42px rgba(8,36,95,.16);
            margin-bottom:20px;
        }

        .hero-title{
            font-size:1.35rem;
            font-weight:900;
            margin-bottom:6px;
        }

        .hero-sub{
            color:rgba(255,255,255,.82);
            margin:0;
        }

        .card-box{
            background:var(--card);
            border:1px solid var(--line);
            border-radius:20px;
            box-shadow:0 8px 22px rgba(15,23,42,.04);
            padding:22px;
        }

        .rank-badge{
            width:40px;
            height:40px;
            border-radius:50%;
            display:inline-flex;
            align-items:center;
            justify-content:center;
            font-weight:900;
            background:#eef5ff;
            color:var(--blue);
        }

        .btn-premium{
            border-radius:12px;
            font-weight:800;
            padding:12px 16px;
            min-height:44px;
        }
    </style>

    <div class="leader-shell">
        <div class="hero">
            <div class="hero-title">{{ $quiz->judul }}</div>
            <p class="hero-sub">Leaderboard quiz untuk melihat skor terbaik peserta.</p>
        </div>

        <div class="card-box">
            <div class="table-responsive">
                <table class="table align-middle">
                    <thead>
                        <tr>
                            <th>Rank</th>
                            <th>Nama</th>
                            <th>Skor</th>
                            <th>Benar</th>
                            <th>Submit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($leaderboard as $index => $item)
                            <tr>
                                <td><span class="rank-badge">{{ $index + 1 }}</span></td>
                                <td>{{ $item->user->name ?? 'User' }}</td>
                                <td>{{ $item->score }}</td>
                                <td>{{ $item->correct_answers }}/{{ $item->total_questions }}</td>
                                <td>{{ $item->submitted_at ? $item->submitted_at->format('d M Y, H:i') : '-' }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted">Belum ada data leaderboard.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-3">
                <a href="{{ route('siswa.quiz.index') }}" class="btn btn-outline-secondary btn-premium">
                    Kembali ke Daftar Quiz
                </a>
            </div>
        </div>
    </div>
</div>
@endsection