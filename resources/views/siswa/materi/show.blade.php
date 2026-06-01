@extends('layouts.app')

@section('title', 'Materi ' . $materi->bab . ' - ' . $materi->judul)

@section('content')
@php
    $statusBadgeClass = 'bg-slate-100 text-slate-700';
    $statusTextValue = 'Belum Dibuka';
    $percentValue = '0%';

    if (optional($progress)->is_completed) {
        $statusBadgeClass = 'bg-emerald-100 text-emerald-700';
        $statusTextValue = 'Selesai';
        $percentValue = '100%';
    } elseif (optional($progress)->is_opened) {
        $statusBadgeClass = 'bg-blue-100 text-blue-700';
        $statusTextValue = 'Sedang Dipelajari';
        $percentValue = '50%';
    }
@endphp

<div
    x-data="materiViewer()"
    class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8"
>
    <a href="{{ route('siswa.materi.index') }}"
       class="inline-flex items-center gap-2 text-blue-700 font-bold mb-6 hover:text-blue-800 transition">
        <i class="fa-solid fa-arrow-left"></i>
        Kembali ke daftar chapter
    </a>

    <section class="relative overflow-hidden rounded-[32px] min-h-[340px] shadow-2xl mb-8">
        <img
            src="{{ !empty($materi->gambar) ? asset($materi->gambar) : 'https://placehold.co/1200x600?text=Chapter+Cover' }}"
            alt="{{ $materi->judul }}"
            class="absolute inset-0 w-full h-full object-cover"
            onerror="this.src='https://placehold.co/1200x600?text=Chapter+Cover'"
        >

        <div class="absolute inset-0 bg-gradient-to-r from-slate-950/95 via-slate-900/75 to-slate-800/35"></div>
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,rgba(255,255,255,0.18),transparent_30%)]"></div>

        <div class="relative z-10 p-6 lg:p-10 max-w-4xl text-white">
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/10 border border-white/15 font-bold mb-5 backdrop-blur-sm">
                <i class="fa-solid fa-book-open"></i>
                Chapter {{ $materi->bab }}
            </div>

            <h1 class="text-4xl md:text-5xl font-extrabold leading-tight tracking-tight mb-4">
                {{ $materi->judul }}
            </h1>

            <p class="text-white/85 text-base md:text-lg leading-8 max-w-3xl">
                {{ $materi->subjudul ?? $materi->deskripsi ?? 'Materi pembelajaran chapter ini.' }}
            </p>

            <div class="flex flex-wrap gap-3 mt-6">
                <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/10 border border-white/10 text-white/90 font-semibold">
                    <i class="fa-solid fa-layer-group"></i>
                    {{ $materi->subMateri->count() }} Sub Materi
                </span>

                <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/10 border border-white/10 text-white/90 font-semibold">
                    <i class="fa-solid fa-clock"></i>
                    {{ $materi->durasi }} menit
                </span>
            </div>
        </div>
    </section>

    <section class="bg-white rounded-[28px] border border-slate-200 shadow-lg p-6 mb-8">
        <div class="flex flex-col xl:flex-row xl:items-center xl:justify-between gap-6">
            <div class="max-w-2xl">
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-blue-50 text-blue-700 font-bold mb-4">
                    <i class="fa-solid fa-chart-line"></i>
                    Progress Chapter
                </div>

                <h3 class="text-2xl font-extrabold text-slate-800 mb-2">
                    Pantau progres belajarmu secara realtime
                </h3>

                <p class="text-slate-500 leading-8">
                    Progress chapter akan bertambah saat kamu menyelesaikan sub materi satu per satu.
                </p>
            </div>

            <div class="flex flex-wrap items-center gap-3">
                <span
                    id="statusBadge"
                    class="inline-flex items-center gap-2 px-4 py-2 rounded-full font-bold {{ $statusBadgeClass }}"
                >
                    <i class="fa-solid fa-chart-line"></i>
                    {{ $statusTextValue }}
                </span>

                <button
                    type="button"
                    id="btnMarkOpened"
                    class="px-5 py-3 rounded-2xl bg-blue-600 hover:bg-blue-700 text-white font-bold shadow-lg shadow-blue-200 transition"
                >
                    Simpan Aktivitas Buka
                </button>

                <button
                    type="button"
                    id="btnMarkCompleted"
                    class="px-5 py-3 rounded-2xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold shadow-lg shadow-emerald-200 transition"
                >
                    Tandai Chapter Selesai
                </button>
            </div>
        </div>

        <div class="grid sm:grid-cols-2 xl:grid-cols-4 gap-4 mt-7">
            <div class="rounded-[24px] bg-slate-50 border border-slate-200 p-5">
                <p class="text-slate-500 mb-2">Status</p>
                <h4 id="statusText" class="text-lg font-extrabold text-slate-800">
                    {{ $statusTextValue }}
                </h4>
            </div>

            <div class="rounded-[24px] bg-blue-50 border border-blue-100 p-5">
                <p class="text-slate-500 mb-2">Persentase</p>
                <h4 id="percentText" class="text-lg font-extrabold text-blue-700">
                    {{ $percentValue }}
                </h4>
                <div class="mt-4 h-2.5 w-full bg-blue-100 rounded-full overflow-hidden">
                    <div
                        id="percentBar"
                        class="h-full bg-blue-600 rounded-full transition-all duration-500"
                        style="width: {{ $percentValue }};"
                    ></div>
                </div>
            </div>

            <div class="rounded-[24px] bg-amber-50 border border-amber-100 p-5">
                <p class="text-slate-500 mb-2">Terakhir Dibuka</p>
                <h4 id="lastOpenedText" class="text-sm font-extrabold text-slate-800 leading-6 break-words">
                    {{ optional($progress?->last_accessed_at)->format('d-m-Y H:i') ?? '-' }}
                </h4>
            </div>

            <div class="rounded-[24px] bg-emerald-50 border border-emerald-100 p-5">
                <p class="text-slate-500 mb-2">Selesai Pada</p>
                <h4 id="completedText" class="text-sm font-extrabold text-slate-800 leading-6 break-words">
                    {{ optional($progress?->completed_at)->format('d-m-Y H:i') ?? '-' }}
                </h4>
            </div>
        </div>
    </section>

    <section class="grid lg:grid-cols-2 gap-6 mb-8">
        <div class="bg-white rounded-[28px] border border-slate-200 shadow-lg p-6">
            <div class="flex items-center gap-3 mb-3">
                <div class="w-12 h-12 rounded-2xl bg-red-50 text-red-500 flex items-center justify-center">
                    <i class="fa-solid fa-circle-play text-xl"></i>
                </div>
                <div>
                    <h3 class="text-2xl font-extrabold text-slate-800">Video Pembelajaran</h3>
                    <p class="text-slate-500">Mulai dari gambaran umum chapter ini.</p>
                </div>
            </div>

            @if(!empty($materi->video))
                @php
                    $videoUrl = $materi->video;
                    // Konversi youtube.com/watch?v=ID atau youtu.be/ID ke format embed
                    if (preg_match('/(?:youtube\.com\/watch\?v=|youtu\.be\/)([^\&\?\/]+)/', $videoUrl, $match)) {
                        $videoUrl = 'https://www.youtube.com/embed/' . $match[1];
                    }
                @endphp
                <div class="relative w-full pt-[56.25%] rounded-3xl overflow-hidden bg-slate-950 mt-5">
                    <iframe
                        src="{{ $videoUrl }}"
                        class="absolute inset-0 w-full h-full"
                        title="Video Pembelajaran"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen>
                    </iframe>
                </div>
            @else
                <div class="rounded-2xl bg-slate-100 text-slate-500 px-5 py-12 text-center font-semibold mt-5">
                    Video pembelajaran belum tersedia.
                </div>
            @endif
        </div>

        <div class="bg-white rounded-[28px] border border-slate-200 shadow-lg p-6">
            <div class="flex items-center gap-3 mb-3">
                <div class="w-12 h-12 rounded-2xl bg-blue-50 text-blue-600 flex items-center justify-center">
                    <i class="fa-solid fa-circle-info text-xl"></i>
                </div>
                <div>
                    <h3 class="text-2xl font-extrabold text-slate-800">Tentang Chapter Ini</h3>
                    <p class="text-slate-500">Ringkasan dan informasi pembelajaran.</p>
                </div>
            </div>

            <p class="text-slate-500 leading-8 mb-5 mt-5">
                {{ $materi->deskripsi ?? 'Chapter ini berisi materi pembelajaran yang disusun bertahap agar siswa lebih mudah memahami isi pembelajaran.' }}
            </p>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="bg-blue-50 rounded-3xl p-5">
                    <p class="text-slate-500 mb-2">Jumlah Materi</p>
                    <h4 class="text-4xl font-extrabold text-blue-600">
                        {{ $materi->subMateri->count() }}
                    </h4>
                </div>

                <div class="bg-emerald-50 rounded-3xl p-5">
                    <p class="text-slate-500 mb-2">Mode Belajar</p>
                    <h4 class="text-xl font-extrabold text-emerald-600 leading-8">
                        Visual & Audio
                    </h4>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white rounded-[28px] border border-slate-200 shadow-lg p-6">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">
            <div>
                <h3 class="text-2xl font-extrabold text-slate-800 mb-2">Isi Materi</h3>
                <p class="text-slate-500 leading-8">
                    Buka dan selesaikan sub materi satu per satu untuk menaikkan progress.
                </p>
            </div>

            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-slate-100 text-slate-700 font-semibold">
                <i class="fa-solid fa-book"></i>
                {{ $materi->subMateri->count() }} bagian tersedia
            </div>
        </div>

        @if($materi->subMateri->count())
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-5">
                @foreach($materi->subMateri as $sub)
                    @php
                        $items = $sub->detailItems->map(function ($item) {
                            return [
                                'label' => $item->label,
                                'nilai' => $item->nilai,
                                'arti'  => $item->arti,
                                'warna' => $item->warna,
                            ];
                        })->values();

                        $payload = [
                            'id'    => $sub->id,
                            'title' => $sub->judul,
                            'type'  => $sub->tipe ?? 'standard',
                            'items' => $items,
                        ];
                    @endphp

                    <div class="rounded-[24px] border border-slate-200 bg-white shadow-md p-5 hover:-translate-y-1 hover:shadow-xl transition">
                        <div class="w-14 h-14 rounded-2xl bg-blue-50 text-blue-600 flex items-center justify-center text-xl mb-4">
                            <i class="{{ $sub->icon ?? 'fa-solid fa-book-open' }}"></i>
                        </div>

                        <h4 class="text-xl font-extrabold text-slate-800 mb-2">
                            {{ $sub->judul }}
                        </h4>

                        <p class="text-slate-500 leading-8 min-h-[96px]">
                            {{ $sub->deskripsi }}
                        </p>

                        <button
                            type="button"
                            data-open-sub
                            data-sub-id="{{ $sub->id }}"
                            @click='openModal(@json($payload))'
                            class="w-full mt-4 px-4 py-3 rounded-xl bg-gradient-to-r from-blue-700 to-blue-500 text-white font-bold shadow-lg hover:from-blue-800 hover:to-blue-600 transition"
                        >
                            Buka Materi
                        </button>
                    </div>
                @endforeach
            </div>
        @else
            <div class="rounded-2xl bg-amber-50 text-amber-700 px-5 py-4 text-center font-semibold">
                Chapter ini belum memiliki sub materi.
            </div>
        @endif
    </section>

    <div
        x-show="isOpen"
        x-transition.opacity
        class="fixed inset-0 z-50 flex items-center justify-center px-4 py-6"
        style="display: none;"
    >
        <div
            @click="closeModal()"
            class="absolute inset-0 bg-slate-950/60 backdrop-blur-sm"
        ></div>

        <div
            x-transition
            @click.stop
            class="relative w-full max-w-6xl bg-white rounded-[30px] shadow-2xl overflow-hidden max-h-[90vh] flex flex-col"
        >
            <div class="flex items-start justify-between gap-4 px-6 py-5 border-b border-slate-200">
                <div>
                    <h3 class="text-2xl font-extrabold text-slate-800" x-text="modalTitle"></h3>
                    <p class="text-slate-500 mt-1 leading-7">
                        Klik item untuk mendengar suara pelafalan bahasa Inggris.
                    </p>
                </div>

                <button
                    type="button"
                    @click="closeModal()"
                    class="w-10 h-10 rounded-full bg-slate-100 hover:bg-slate-200 text-slate-600"
                >
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>

            <div class="p-6 overflow-y-auto">
                <template x-if="activeItems.length === 0">
                    <div class="rounded-2xl bg-amber-50 text-amber-700 px-5 py-4 text-center font-semibold">
                        Materi belum memiliki detail item.
                    </div>
                </template>

                <template x-if="activeType === 'alphabet' || activeType === 'numbers'">
                    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4">
                        <template x-for="(item, index) in activeItems" :key="index">
                            <button
                                type="button"
                                @click="speakItem(item)"
                                class="rounded-[22px] border border-slate-200 bg-gradient-to-b from-white to-slate-50 p-5 shadow-md hover:-translate-y-1 hover:shadow-lg transition text-center"
                            >
                                <div class="text-4xl font-extrabold text-blue-600 mb-2" x-text="item.label"></div>
                                <div class="text-slate-600 font-semibold" x-text="item.nilai"></div>
                            </button>
                        </template>
                    </div>
                </template>

                <template x-if="activeType === 'colors'">
                    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4">
                        <template x-for="(item, index) in activeItems" :key="index">
                            <button
                                type="button"
                                @click="speakItem(item)"
                                class="rounded-[22px] border border-slate-200 bg-white p-5 shadow-md hover:-translate-y-1 hover:shadow-lg transition text-center"
                            >
                                <div
                                    class="w-16 h-16 rounded-full mx-auto mb-3 border border-slate-200"
                                    :style="'background:' + (item.warna || '#e5e7eb')"
                                ></div>
                                <div class="text-slate-700 font-semibold" x-text="item.label"></div>
                                <div class="text-slate-500 text-sm" x-text="item.arti || ''"></div>
                            </button>
                        </template>
                    </div>
                </template>

                <template x-if="activeType === 'greetings' || activeType === 'commands' || activeType === 'standard'">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <template x-for="(item, index) in activeItems" :key="index">
                            <button
                                type="button"
                                @click="speakItem(item)"
                                class="rounded-[22px] border border-slate-200 bg-white p-5 shadow-md hover:-translate-y-1 hover:shadow-lg transition text-left"
                            >
                                <div class="text-xl font-extrabold text-blue-700 mb-1" x-text="item.label"></div>
                                <div class="text-slate-600" x-text="item.nilai || ''"></div>
                                <div class="text-slate-500 text-sm mt-1" x-text="item.arti || ''"></div>
                            </button>
                        </template>
                    </div>
                </template>

                <div
                    class="mt-6 rounded-2xl bg-blue-50 text-blue-700 font-semibold px-5 py-4 text-center"
                    x-text="status"
                >
                    Klik salah satu item untuk memulai suara.
                </div>

                <div class="mt-4 flex justify-end">
                    <button
                        type="button"
                        id="btnCompleteSub"
                        class="px-5 py-3 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold shadow-lg transition"
                    >
                        Tandai Sub Materi Selesai
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
let currentSubId = null;

function materiViewer() {
    return {
        isOpen: false,
        modalTitle: '',
        activeType: '',
        activeItems: [],
        status: 'Klik salah satu item untuk memulai suara.',

        openModal(payload) {
            this.modalTitle = payload?.title || '';
            this.activeType = payload?.type || 'standard';
            this.activeItems = Array.isArray(payload?.items) ? payload.items : [];
            currentSubId = payload?.id || null;
            this.isOpen = true;
            this.status = 'Klik salah satu item untuk memulai suara.';
            document.body.classList.add('overflow-hidden');
        },

        closeModal() {
            this.isOpen = false;
            this.modalTitle = '';
            this.activeType = '';
            this.activeItems = [];
            currentSubId = null;
            this.status = 'Klik salah satu item untuk memulai suara.';

            if ('speechSynthesis' in window) {
                window.speechSynthesis.cancel();
            }

            document.body.classList.remove('overflow-hidden');
        },

        speakItem(item) {
            if (!('speechSynthesis' in window)) {
                this.status = 'Browser tidak mendukung suara.';
                return;
            }

            let text = '';

            if (this.activeType === 'alphabet') {
                text = `${item.label} for ${item.nilai || ''}`.trim();
            } else if (this.activeType === 'numbers') {
                text = `${item.label} ${item.nilai || ''}`.trim();
            } else if (this.activeType === 'colors') {
                text = item.label || '';
            } else {
                text = item.label || '';
            }

            if (!text) {
                this.status = 'Item tidak memiliki teks untuk dibacakan.';
                return;
            }

            window.speechSynthesis.cancel();

            const utterance = new SpeechSynthesisUtterance(text);
            utterance.lang = 'en-US';
            utterance.rate = 0.55;
            utterance.pitch = 1;

            utterance.onstart = () => {
                this.status = 'Memutar suara: ' + text;
            };

            utterance.onend = () => {
                this.status = 'Selesai: ' + text;
            };

            utterance.onerror = () => {
                this.status = 'Gagal memutar suara.';
            };

            window.speechSynthesis.speak(utterance);
        }
    }
}

document.addEventListener('DOMContentLoaded', function () {
    const btnMarkOpened = document.getElementById('btnMarkOpened');
    const btnMarkCompleted = document.getElementById('btnMarkCompleted');
    const btnCompleteSub = document.getElementById('btnCompleteSub');

    const statusBadge = document.getElementById('statusBadge');
    const statusText = document.getElementById('statusText');
    const percentText = document.getElementById('percentText');
    const percentBar = document.getElementById('percentBar');
    const lastOpenedText = document.getElementById('lastOpenedText');
    const completedText = document.getElementById('completedText');

    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    function formatDateTime(value) {
        if (!value) return '-';

        const date = new Date(value);
        if (isNaN(date.getTime())) return value;

        const pad = (n) => String(n).padStart(2, '0');
        return `${pad(date.getDate())}-${pad(date.getMonth() + 1)}-${date.getFullYear()} ${pad(date.getHours())}:${pad(date.getMinutes())}`;
    }

    function setOpenedState(percent = 50) {
        statusBadge.className = 'inline-flex items-center gap-2 px-4 py-2 rounded-full font-bold bg-blue-100 text-blue-700';
        statusBadge.innerHTML = '<i class="fa-solid fa-chart-line"></i> Sedang Dipelajari';
        statusText.textContent = 'Sedang Dipelajari';
        percentText.textContent = `${percent}%`;
        if (percentBar) percentBar.style.width = `${percent}%`;
    }

    function setCompletedState() {
        statusBadge.className = 'inline-flex items-center gap-2 px-4 py-2 rounded-full font-bold bg-emerald-100 text-emerald-700';
        statusBadge.innerHTML = '<i class="fa-solid fa-chart-line"></i> Selesai';
        statusText.textContent = 'Selesai';
        percentText.textContent = '100%';
        if (percentBar) percentBar.style.width = '100%';
    }

    async function sendProgress(url) {
        const response = await fetch(url, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({})
        });

        const raw = await response.text();

        if (!response.ok) {
            console.error('HTTP ERROR:', response.status, raw);
            throw new Error(`HTTP ${response.status}: ${raw}`);
        }

        return JSON.parse(raw);
    }

    btnMarkOpened?.addEventListener('click', async function () {
        const originalText = btnMarkOpened.textContent;

        try {
            btnMarkOpened.disabled = true;
            btnMarkOpened.textContent = 'Memproses...';

            const result = await sendProgress('{{ route('siswa.materi.opened', $materi->id) }}');

            setOpenedState(50);
            lastOpenedText.textContent = formatDateTime(result.data.last_accessed_at);

            btnMarkOpened.textContent = 'Aktivitas Tersimpan';
        } catch (error) {
            alert(error.message);
            btnMarkOpened.textContent = originalText;
        } finally {
            btnMarkOpened.disabled = false;
        }
    });

    btnMarkCompleted?.addEventListener('click', async function () {
        const originalText = btnMarkCompleted.textContent;

        try {
            btnMarkCompleted.disabled = true;
            btnMarkCompleted.textContent = 'Memproses...';

            const result = await sendProgress('{{ route('siswa.materi.completed', $materi->id) }}');

            setCompletedState();
            lastOpenedText.textContent = formatDateTime(result.data.last_accessed_at);
            completedText.textContent = formatDateTime(result.data.completed_at);

            btnMarkCompleted.textContent = 'Chapter Selesai';
        } catch (error) {
            alert(error.message);
            btnMarkCompleted.textContent = originalText;
        } finally {
            btnMarkCompleted.disabled = false;
        }
    });

    document.querySelectorAll('[data-open-sub]').forEach((button) => {
        button.addEventListener('click', async function () {
            const subId = this.dataset.subId;
            if (!subId) return;

            currentSubId = subId;

            try {
                const result = await sendProgress(`/siswa/materi/{{ $materi->id }}/sub/${subId}/opened`);
                setOpenedState(result.data.percent);
                lastOpenedText.textContent = formatDateTime(result.data.last_accessed_at);
            } catch (error) {
                console.error(error);
            }
        });
    });

    btnCompleteSub?.addEventListener('click', async function () {
        if (!currentSubId) {
            alert('Sub materi belum dipilih.');
            return;
        }

        const originalText = btnCompleteSub.textContent;

        try {
            btnCompleteSub.disabled = true;
            btnCompleteSub.textContent = 'Memproses...';

            const result = await sendProgress(`/siswa/materi/{{ $materi->id }}/sub/${currentSubId}/completed`);

            if (result.data.is_completed) {
                setCompletedState();
                completedText.textContent = formatDateTime(result.data.completed_at);
            } else {
                setOpenedState(result.data.percent);
            }

            lastOpenedText.textContent = formatDateTime(result.data.last_accessed_at);
            btnCompleteSub.textContent = 'Sub Materi Selesai';
        } catch (error) {
            alert(error.message);
            btnCompleteSub.textContent = originalText;
        } finally {
            btnCompleteSub.disabled = false;
        }
    });
});
</script>
@endpush