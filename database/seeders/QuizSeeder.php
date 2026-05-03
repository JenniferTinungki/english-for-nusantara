<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Quiz;
use App\Models\QuizQuestion;
use App\Models\QuizAttempt;

class QuizSeeder extends Seeder
{
    public function run(): void
    {
        /*
        |--------------------------------------------------------------------------
        | AUTO RESET DATA QUIZ (AMAN)
        |--------------------------------------------------------------------------
        | Menghapus data lama agar tidak dobel saat seeding ulang
        */

        QuizQuestion::query()->delete();
        QuizAttempt::query()->delete();
        Quiz::query()->delete();

        /*
        |--------------------------------------------------------------------------
        | DATA QUIZ 6 CHAPTER x 10 SOAL
        |--------------------------------------------------------------------------
        */

        $quizData = [

            /*
            |--------------------------------------------------------------------------
            | CHAPTER 0
            |--------------------------------------------------------------------------
            */

            [
                'chapter' => 0,
                'judul' => 'Quiz Chapter 0 - Beginning',
                'deskripsi' => 'Quiz dasar pengenalan Bahasa Inggris.',
                'questions' => [

                    ['question' => 'Apa arti dari Hello?', 'a' => 'Halo', 'b' => 'Terima kasih', 'c' => 'Maaf', 'd' => 'Selamat tinggal', 'correct' => 'A'],
                    ['question' => 'Apa arti Good morning?', 'a' => 'Selamat malam', 'b' => 'Selamat pagi', 'c' => 'Halo', 'd' => 'Permisi', 'correct' => 'B'],
                    ['question' => 'Huruf setelah A adalah?', 'a' => 'B', 'b' => 'C', 'c' => 'D', 'd' => 'E', 'correct' => 'A'],
                    ['question' => 'Huruf setelah C adalah?', 'a' => 'A', 'b' => 'B', 'c' => 'D', 'd' => 'E', 'correct' => 'C'],
                    ['question' => 'Apa arti Thank you?', 'a' => 'Tolong', 'b' => 'Maaf', 'c' => 'Terima kasih', 'd' => 'Permisi', 'correct' => 'C'],
                    ['question' => 'Apa arti Sorry?', 'a' => 'Maaf', 'b' => 'Halo', 'c' => 'Terima kasih', 'd' => 'Selamat pagi', 'correct' => 'A'],
                    ['question' => 'Apa arti Good bye?', 'a' => 'Sampai jumpa', 'b' => 'Halo', 'c' => 'Maaf', 'd' => 'Tolong', 'correct' => 'A'],
                    ['question' => 'Huruf pertama alfabet?', 'a' => 'A', 'b' => 'B', 'c' => 'Z', 'd' => 'C', 'correct' => 'A'],
                    ['question' => 'Huruf terakhir alfabet?', 'a' => 'Y', 'b' => 'X', 'c' => 'W', 'd' => 'Z', 'correct' => 'D'],
                    ['question' => 'Ungkapan sapaan adalah?', 'a' => 'Hello', 'b' => 'Sorry', 'c' => 'Good bye', 'd' => 'Please', 'correct' => 'A'],

                ]
            ],

            /*
            |--------------------------------------------------------------------------
            | CHAPTER 1
            |--------------------------------------------------------------------------
            */

            [
                'chapter' => 1,
                'judul' => 'Quiz Chapter 1 - About Me',
                'deskripsi' => 'Quiz tentang perkenalan diri.',
                'questions' => [

                    ['question' => 'Kalimat memperkenalkan nama adalah?', 'a' => 'I am fine', 'b' => 'My name is Budi', 'c' => 'Good bye', 'd' => 'See you', 'correct' => 'B'],
                    ['question' => 'What is your name? berarti?', 'a' => 'Berapa umurmu?', 'b' => 'Siapa kamu?', 'c' => 'Siapa namamu?', 'd' => 'Apa kabarmu?', 'correct' => 'C'],
                    ['question' => 'How are you? berarti?', 'a' => 'Apa kabar?', 'b' => 'Siapa nama kamu?', 'c' => 'Di mana rumahmu?', 'd' => 'Berapa umurmu?', 'correct' => 'A'],
                    ['question' => 'Jawaban How are you?', 'a' => 'My name is Budi', 'b' => 'I am fine', 'c' => 'I am ten', 'd' => 'I live here', 'correct' => 'B'],
                    ['question' => 'How old are you? berarti?', 'a' => 'Berapa umurmu?', 'b' => 'Apa kabarmu?', 'c' => 'Siapa kamu?', 'd' => 'Di mana kamu?', 'correct' => 'A'],
                    ['question' => 'I am 10 years old berarti?', 'a' => 'Nama saya 10', 'b' => 'Saya berumur 10 tahun', 'c' => 'Saya tinggal 10 tahun', 'd' => 'Saya kelas 10', 'correct' => 'B'],
                    ['question' => 'Age berarti?', 'a' => 'Nama', 'b' => 'Umur', 'c' => 'Rumah', 'd' => 'Sekolah', 'correct' => 'B'],
                    ['question' => 'Name berarti?', 'a' => 'Nama', 'b' => 'Alamat', 'c' => 'Teman', 'd' => 'Kelas', 'correct' => 'A'],
                    ['question' => 'I live in Bitung berarti?', 'a' => 'Saya pergi ke Bitung', 'b' => 'Saya tinggal di Bitung', 'c' => 'Saya sekolah di Bitung', 'd' => 'Saya lahir di Bitung', 'correct' => 'B'],
                    ['question' => 'Kalimat benar adalah?', 'a' => 'My name are Budi', 'b' => 'My name is Budi', 'c' => 'I name Budi', 'd' => 'Name my Budi', 'correct' => 'B'],

                ]
            ],

            /*
            |--------------------------------------------------------------------------
            | CHAPTER 2
            |--------------------------------------------------------------------------
            */

            [
                'chapter' => 2,
                'judul' => 'Quiz Chapter 2 - My Friends',
                'deskripsi' => 'Quiz tentang teman.',
                'questions' => [

                    ['question' => 'Friend berarti?', 'a' => 'Guru', 'b' => 'Teman', 'c' => 'Saudara', 'd' => 'Tetangga', 'correct' => 'B'],
                    ['question' => 'This is my friend berarti?', 'a' => 'Ini guru saya', 'b' => 'Ini teman saya', 'c' => 'Ini ayah saya', 'd' => 'Ini kelas saya', 'correct' => 'B'],
                    ['question' => 'Best friend berarti?', 'a' => 'Teman sekolah', 'b' => 'Sahabat', 'c' => 'Guru terbaik', 'd' => 'Tetangga baik', 'correct' => 'B'],
                    ['question' => 'Kind berarti?', 'a' => 'Marah', 'b' => 'Baik', 'c' => 'Sedih', 'd' => 'Jahat', 'correct' => 'B'],
                    ['question' => 'Helpful berarti?', 'a' => 'Pemalas', 'b' => 'Suka menolong', 'c' => 'Cepat', 'd' => 'Diam', 'correct' => 'B'],
                    ['question' => 'She is my friend berarti?', 'a' => 'Dia teman saya', 'b' => 'Dia ibu saya', 'c' => 'Dia guru saya', 'd' => 'Dia nenek saya', 'correct' => 'A'],
                    ['question' => 'He is my friend berarti?', 'a' => 'Dia ayah saya', 'b' => 'Dia teman saya', 'c' => 'Dia kakak saya', 'd' => 'Dia paman saya', 'correct' => 'B'],
                    ['question' => 'Friends berarti?', 'a' => 'Satu teman', 'b' => 'Banyak teman', 'c' => 'Guru', 'd' => 'Keluarga', 'correct' => 'B'],
                    ['question' => 'They are my friends adalah kalimat?', 'a' => 'Salah', 'b' => 'Benar', 'c' => 'Tidak lengkap', 'd' => 'Tidak tahu', 'correct' => 'B'],
                    ['question' => 'Sapaan untuk teman?', 'a' => 'Go away', 'b' => 'Hello my friend', 'c' => 'Be quiet', 'd' => 'No entry', 'correct' => 'B'],

                ]
            ],

            /*
            |--------------------------------------------------------------------------
            | CHAPTER 3
            |--------------------------------------------------------------------------
            */

            [
                'chapter' => 3,
                'judul' => 'Quiz Chapter 3 - My School',
                'deskripsi' => 'Quiz tentang sekolah.',
                'questions' => [

                    ['question' => 'School berarti?', 'a' => 'Rumah', 'b' => 'Sekolah', 'c' => 'Pasar', 'd' => 'Toko', 'correct' => 'B'],
                    ['question' => 'Library berarti?', 'a' => 'Perpustakaan', 'b' => 'Kelas', 'c' => 'Kantin', 'd' => 'Lapangan', 'correct' => 'A'],
                    ['question' => 'Classroom berarti?', 'a' => 'Ruang guru', 'b' => 'Kelas', 'c' => 'Perpustakaan', 'd' => 'Kebun', 'correct' => 'B'],
                    ['question' => 'Teacher berarti?', 'a' => 'Guru', 'b' => 'Siswa', 'c' => 'Kepala sekolah', 'd' => 'Teman', 'correct' => 'A'],
                    ['question' => 'Student berarti?', 'a' => 'Guru', 'b' => 'Siswa', 'c' => 'Petugas', 'd' => 'Orang tua', 'correct' => 'B'],
                    ['question' => 'Book berarti?', 'a' => 'Pensil', 'b' => 'Tas', 'c' => 'Buku', 'd' => 'Kursi', 'correct' => 'C'],
                    ['question' => 'Bag berarti?', 'a' => 'Tas', 'b' => 'Meja', 'c' => 'Buku', 'd' => 'Pintu', 'correct' => 'A'],
                    ['question' => 'Pencil digunakan untuk?', 'a' => 'Menulis', 'b' => 'Makan', 'c' => 'Tidur', 'd' => 'Main', 'correct' => 'A'],
                    ['question' => 'This is my classroom berarti?', 'a' => 'Ini rumah saya', 'b' => 'Ini kelas saya', 'c' => 'Ini teman saya', 'd' => 'Ini tas saya', 'correct' => 'B'],
                    ['question' => 'Tempat membaca buku?', 'a' => 'Library', 'b' => 'Garden', 'c' => 'Hall', 'd' => 'Kitchen', 'correct' => 'A'],

                ]
            ],

            /*
            |--------------------------------------------------------------------------
            | CHAPTER 4
            |--------------------------------------------------------------------------
            */

            [
                'chapter' => 4,
                'judul' => 'Quiz Chapter 4 - Family',
                'deskripsi' => 'Quiz tentang keluarga.',
                'questions' => [

                    ['question' => 'Father berarti?', 'a' => 'Ayah', 'b' => 'Ibu', 'c' => 'Paman', 'd' => 'Kakek', 'correct' => 'A'],
                    ['question' => 'Mother berarti?', 'a' => 'Nenek', 'b' => 'Ibu', 'c' => 'Bibi', 'd' => 'Saudara', 'correct' => 'B'],
                    ['question' => 'Brother berarti?', 'a' => 'Saudara perempuan', 'b' => 'Saudara laki-laki', 'c' => 'Anak', 'd' => 'Paman', 'correct' => 'B'],
                    ['question' => 'Sister berarti?', 'a' => 'Saudara perempuan', 'b' => 'Saudara laki-laki', 'c' => 'Ibu', 'd' => 'Anak', 'correct' => 'A'],
                    ['question' => 'Parents berarti?', 'a' => 'Anak-anak', 'b' => 'Orang tua', 'c' => 'Sepupu', 'd' => 'Teman', 'correct' => 'B'],
                    ['question' => 'Grandmother berarti?', 'a' => 'Nenek', 'b' => 'Kakek', 'c' => 'Ibu', 'd' => 'Bibi', 'correct' => 'A'],
                    ['question' => 'Grandfather berarti?', 'a' => 'Ayah', 'b' => 'Kakek', 'c' => 'Paman', 'd' => 'Guru', 'correct' => 'B'],
                    ['question' => 'He is my father berarti?', 'a' => 'Dia ibu saya', 'b' => 'Dia ayah saya', 'c' => 'Dia teman saya', 'd' => 'Dia guru saya', 'correct' => 'B'],
                    ['question' => 'She is my mother berarti?', 'a' => 'Dia ibu saya', 'b' => 'Dia nenek saya', 'c' => 'Dia kakak saya', 'd' => 'Dia guru saya', 'correct' => 'A'],
                    ['question' => 'They are my parents adalah kalimat?', 'a' => 'Benar', 'b' => 'Salah', 'c' => 'Tidak lengkap', 'd' => 'Tidak tahu', 'correct' => 'A'],

                ]
            ],

            /*
            |--------------------------------------------------------------------------
            | CHAPTER 5
            |--------------------------------------------------------------------------
            */

            [
                'chapter' => 5,
                'judul' => 'Quiz Chapter 5 - Daily Activities',
                'deskripsi' => 'Quiz tentang aktivitas harian.',
                'questions' => [

                    ['question' => 'Wake up berarti?', 'a' => 'Tidur', 'b' => 'Bangun tidur', 'c' => 'Makan', 'd' => 'Belajar', 'correct' => 'B'],
                    ['question' => 'Go to school berarti?', 'a' => 'Pergi sekolah', 'b' => 'Pulang sekolah', 'c' => 'Main sekolah', 'd' => 'Masuk rumah', 'correct' => 'A'],
                    ['question' => 'Have breakfast berarti?', 'a' => 'Makan malam', 'b' => 'Sarapan', 'c' => 'Minum', 'd' => 'Tidur', 'correct' => 'B'],
                    ['question' => 'Study berarti?', 'a' => 'Belajar', 'b' => 'Main', 'c' => 'Makan', 'd' => 'Tidur', 'correct' => 'A'],
                    ['question' => 'Play berarti?', 'a' => 'Menulis', 'b' => 'Bermain', 'c' => 'Tidur', 'd' => 'Belajar', 'correct' => 'B'],
                    ['question' => 'Go to bed berarti?', 'a' => 'Pergi mandi', 'b' => 'Pergi tidur', 'c' => 'Pergi sekolah', 'd' => 'Pergi main', 'correct' => 'B'],
                    ['question' => 'I go to school every day adalah?', 'a' => 'Benar', 'b' => 'Salah', 'c' => 'Tidak lengkap', 'd' => 'Tidak tahu', 'correct' => 'A'],
                    ['question' => 'I study at night berarti?', 'a' => 'Saya tidur malam', 'b' => 'Saya belajar malam hari', 'c' => 'Saya makan malam', 'd' => 'Saya mandi malam', 'correct' => 'B'],
                    ['question' => 'My daily routine is fun berarti?', 'a' => 'Rutinitas saya menyenangkan', 'b' => 'Sekolah saya menyenangkan', 'c' => 'Teman saya lucu', 'd' => 'Rumah saya besar', 'correct' => 'A'],
                    ['question' => 'Aktivitas pagi hari?', 'a' => 'Sleep', 'b' => 'Wake up', 'c' => 'Dream', 'd' => 'Snore', 'correct' => 'B'],

                ]
            ],

        ];

        /*
        |--------------------------------------------------------------------------
        | INSERT TO DATABASE
        |--------------------------------------------------------------------------
        */

        foreach ($quizData as $item) {

            $quiz = Quiz::create([
                'chapter'       => $item['chapter'],
                'judul'         => $item['judul'],
                'deskripsi'     => $item['deskripsi'],
                'durasi_menit'  => 5,
                'is_active'     => true,
            ]);

            foreach ($item['questions'] as $q) {
                QuizQuestion::create([
                    'quiz_id'         => $quiz->id,
                    'question'        => $q['question'],
                    'option_a'        => $q['a'],
                    'option_b'        => $q['b'],
                    'option_c'        => $q['c'],
                    'option_d'        => $q['d'],
                    'correct_answer'  => $q['correct'],
                ]);
            }
        }
    }
}