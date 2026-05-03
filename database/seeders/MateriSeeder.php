<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MateriSeeder extends Seeder
{
    public function run(): void
    {
        $materi = [

            /*
            |--------------------------------------------------------------------------
            | CHAPTER 0 - INTRODUCTION
            |--------------------------------------------------------------------------
            */

            [
                'bab' => 0,
                'judul' => 'Chapter 0 - Introduction',
                'subjudul' => 'Introduction',
                'deskripsi' => 'Pengenalan aplikasi dan materi dasar English for Nusantara.',
                'isi_materi' => 'Welcome to English for Nusantara. Pada chapter ini siswa akan mengenal dasar pembelajaran bahasa Inggris, tujuan belajar, dan cara menggunakan aplikasi.',
                'video' => 'videos/materi/chapter0/introduction.mp4',
                'audio' => 'audio/materi/introduction.mp3',
                'gambar' => 'images/materi/chapter0/introduction.jpg',
                'durasi' => '05:00',
            ],
            [
                'bab' => 0,
                'judul' => 'Chapter 0 - Introduction',
                'subjudul' => 'Alphabet',
                'deskripsi' => 'Belajar huruf A sampai Z dan cara pengucapannya.',
                'isi_materi' => 'A, B, C, D, E, F, G, H, I, J, K, L, M, N, O, P, Q, R, S, T, U, V, W, X, Y, Z. Siswa belajar nama huruf dan cara pelafalannya.',
                'video' => 'videos/materi/chapter0/alphabet.mp4',
                'audio' => 'audio/materi/alphabet.mp3',
                'gambar' => 'images/materi/chapter0/alphabet.jpg',
                'durasi' => '06:30',
            ],
            [
                'bab' => 0,
                'judul' => 'Chapter 0 - Introduction',
                'subjudul' => 'Numbers',
                'deskripsi' => 'Belajar angka 1 sampai 20.',
                'isi_materi' => 'One, Two, Three, Four, Five, Six, Seven, Eight, Nine, Ten, Eleven, Twelve, Thirteen, Fourteen, Fifteen, Sixteen, Seventeen, Eighteen, Nineteen, Twenty.',
                'video' => 'videos/materi/chapter0/numbers.mp4',
                'audio' => 'audio/materi/numbers.mp3',
                'gambar' => 'images/materi/chapter0/numbers.jpg',
                'durasi' => '05:20',
            ],
            [
                'bab' => 0,
                'judul' => 'Chapter 0 - Introduction',
                'subjudul' => 'Colors',
                'deskripsi' => 'Belajar nama-nama warna dasar.',
                'isi_materi' => 'Red, Blue, Yellow, Green, Black, White, Brown, Pink, Purple, Orange, Gray.',
                'video' => 'videos/materi/chapter0/colors.mp4',
                'audio' => 'audio/materi/colors.mp3',
                'gambar' => 'images/materi/chapter0/colors.jpg',
                'durasi' => '04:40',
            ],
            [
                'bab' => 0,
                'judul' => 'Chapter 0 - Introduction',
                'subjudul' => 'Days',
                'deskripsi' => 'Belajar nama hari dalam bahasa Inggris.',
                'isi_materi' => 'Monday, Tuesday, Wednesday, Thursday, Friday, Saturday, Sunday.',
                'video' => 'videos/materi/chapter0/days.mp4',
                'audio' => 'audio/materi/days.mp3',
                'gambar' => 'images/materi/chapter0/days.jpg',
                'durasi' => '04:10',
            ],
            [
                'bab' => 0,
                'judul' => 'Chapter 0 - Introduction',
                'subjudul' => 'Months',
                'deskripsi' => 'Belajar nama bulan dalam bahasa Inggris.',
                'isi_materi' => 'January, February, March, April, May, June, July, August, September, October, November, December.',
                'video' => 'videos/materi/chapter0/months.mp4',
                'audio' => 'audio/materi/months.mp3',
                'gambar' => 'images/materi/chapter0/months.jpg',
                'durasi' => '04:50',
            ],

            /*
            |--------------------------------------------------------------------------
            | CHAPTER 1 - GREETINGS
            |--------------------------------------------------------------------------
            */

            [
                'bab' => 1,
                'judul' => 'Chapter 1 - Greetings',
                'subjudul' => 'Greeting Expressions',
                'deskripsi' => 'Belajar salam formal dan informal.',
                'isi_materi' => 'Good morning, Good afternoon, Good evening, Hello, Hi. Digunakan untuk menyapa orang sesuai waktu dan situasi.',
                'video' => 'videos/materi/chapter1/greetings.mp4',
                'audio' => 'audio/materi/greetings.mp3',
                'gambar' => 'images/materi/chapter1/greetings.jpg',
                'durasi' => '05:30',
            ],
            [
                'bab' => 1,
                'judul' => 'Chapter 1 - Greetings',
                'subjudul' => 'Introducing Yourself',
                'deskripsi' => 'Belajar memperkenalkan diri.',
                'isi_materi' => 'My name is ..., I am from ..., Nice to meet you. Materi ini membantu siswa memperkenalkan nama dan asal.',
                'video' => 'videos/materi/chapter1/introducing-yourself.mp4',
                'audio' => 'audio/materi/greetings.mp3',
                'gambar' => 'images/materi/chapter1/introducing-yourself.jpg',
                'durasi' => '06:00',
            ],
            [
                'bab' => 1,
                'judul' => 'Chapter 1 - Greetings',
                'subjudul' => 'Asking Someone\'s Name',
                'deskripsi' => 'Belajar menanyakan nama seseorang.',
                'isi_materi' => 'What is your name? Who are you? May I know your name?',
                'video' => 'videos/materi/chapter1/asking-name.mp4',
                'audio' => 'audio/materi/greetings.mp3',
                'gambar' => 'images/materi/chapter1/asking-name.jpg',
                'durasi' => '04:20',
            ],
            [
                'bab' => 1,
                'judul' => 'Chapter 1 - Greetings',
                'subjudul' => 'Polite Expressions',
                'deskripsi' => 'Belajar kata sopan santun.',
                'isi_materi' => 'Please, Thank you, Sorry, Excuse me. Digunakan untuk komunikasi yang sopan.',
                'video' => 'videos/materi/chapter1/polite-expressions.mp4',
                'audio' => 'audio/materi/greetings.mp3',
                'gambar' => 'images/materi/chapter1/polite-expressions.jpg',
                'durasi' => '04:45',
            ],
            [
                'bab' => 1,
                'judul' => 'Chapter 1 - Greetings',
                'subjudul' => 'Leave Taking',
                'deskripsi' => 'Belajar salam perpisahan.',
                'isi_materi' => 'Goodbye, Bye, See you later, See you tomorrow, Take care.',
                'video' => 'videos/materi/chapter1/leave-taking.mp4',
                'audio' => 'audio/materi/greetings.mp3',
                'gambar' => 'images/materi/chapter1/leave-taking.jpg',
                'durasi' => '04:30',
            ],
            [
                'bab' => 1,
                'judul' => 'Chapter 1 - Greetings',
                'subjudul' => 'Sample Dialogue',
                'deskripsi' => 'Contoh dialog perkenalan sederhana.',
                'isi_materi' => 'A: Hello, my name is Andi. B: Hi Andi, I am Sinta. Nice to meet you. A: Nice to meet you too.',
                'video' => 'videos/materi/chapter1/sample-dialogue.mp4',
                'audio' => 'audio/materi/greetings.mp3',
                'gambar' => 'images/materi/chapter1/sample-dialogue.jpg',
                'durasi' => '05:10',
            ],

            /*
            |--------------------------------------------------------------------------
            | CHAPTER 2 - NUMBERS & COLORS
            |--------------------------------------------------------------------------
            */

            [
                'bab' => 2,
                'judul' => 'Chapter 2 - Numbers & Colors',
                'subjudul' => 'Numbers 1-10',
                'deskripsi' => 'Belajar angka 1 sampai 10.',
                'isi_materi' => 'One, Two, Three, Four, Five, Six, Seven, Eight, Nine, Ten.',
                'video' => 'videos/materi/chapter2/numbers-1-10.mp4',
                'audio' => 'audio/materi/numbers.mp3',
                'gambar' => 'images/materi/chapter2/numbers-1-10.jpg',
                'durasi' => '04:00',
            ],
            [
                'bab' => 2,
                'judul' => 'Chapter 2 - Numbers & Colors',
                'subjudul' => 'Numbers 11-20',
                'deskripsi' => 'Belajar angka 11 sampai 20.',
                'isi_materi' => 'Eleven, Twelve, Thirteen, Fourteen, Fifteen, Sixteen, Seventeen, Eighteen, Nineteen, Twenty.',
                'video' => 'videos/materi/chapter2/numbers-11-20.mp4',
                'audio' => 'audio/materi/numbers.mp3',
                'gambar' => 'images/materi/chapter2/numbers-11-20.jpg',
                'durasi' => '04:20',
            ],
            [
                'bab' => 2,
                'judul' => 'Chapter 2 - Numbers & Colors',
                'subjudul' => 'Basic Colors',
                'deskripsi' => 'Belajar warna dasar.',
                'isi_materi' => 'Red, Blue, Yellow, Green, Black, White.',
                'video' => 'videos/materi/chapter2/basic-colors.mp4',
                'audio' => 'audio/materi/colors.mp3',
                'gambar' => 'images/materi/chapter2/basic-colors.jpg',
                'durasi' => '04:15',
            ],
            [
                'bab' => 2,
                'judul' => 'Chapter 2 - Numbers & Colors',
                'subjudul' => 'More Colors',
                'deskripsi' => 'Belajar warna tambahan.',
                'isi_materi' => 'Brown, Pink, Purple, Orange, Gray.',
                'video' => 'videos/materi/chapter2/more-colors.mp4',
                'audio' => 'audio/materi/colors.mp3',
                'gambar' => 'images/materi/chapter2/more-colors.jpg',
                'durasi' => '04:00',
            ],
            [
                'bab' => 2,
                'judul' => 'Chapter 2 - Numbers & Colors',
                'subjudul' => 'Counting Objects',
                'deskripsi' => 'Menghitung benda sederhana.',
                'isi_materi' => 'There are three books. I have two pencils. She has five flowers.',
                'video' => 'videos/materi/chapter2/counting-objects.mp4',
                'audio' => 'audio/materi/numbers.mp3',
                'gambar' => 'images/materi/chapter2/counting-objects.jpg',
                'durasi' => '05:10',
            ],
            [
                'bab' => 2,
                'judul' => 'Chapter 2 - Numbers & Colors',
                'subjudul' => 'Colors in Sentences',
                'deskripsi' => 'Menggunakan warna dalam kalimat.',
                'isi_materi' => 'The sky is blue. The apple is red. My bag is black.',
                'video' => 'videos/materi/chapter2/colors-in-sentences.mp4',
                'audio' => 'audio/materi/colors.mp3',
                'gambar' => 'images/materi/chapter2/colors-in-sentences.jpg',
                'durasi' => '05:00',
            ],

            /*
            |--------------------------------------------------------------------------
            | CHAPTER 3 - DAYS & MONTHS
            |--------------------------------------------------------------------------
            */

            [
                'bab' => 3,
                'judul' => 'Chapter 3 - Days & Months',
                'subjudul' => 'Days of the Week',
                'deskripsi' => 'Belajar nama hari.',
                'isi_materi' => 'Monday, Tuesday, Wednesday, Thursday, Friday, Saturday, Sunday.',
                'video' => 'videos/materi/chapter3/days-of-the-week.mp4',
                'audio' => 'audio/materi/days.mp3',
                'gambar' => 'images/materi/chapter3/days-of-the-week.jpg',
                'durasi' => '04:30',
            ],
            [
                'bab' => 3,
                'judul' => 'Chapter 3 - Days & Months',
                'subjudul' => 'Months of the Year',
                'deskripsi' => 'Belajar nama bulan.',
                'isi_materi' => 'January, February, March, April, May, June, July, August, September, October, November, December.',
                'video' => 'videos/materi/chapter3/months-of-the-year.mp4',
                'audio' => 'audio/materi/months.mp3',
                'gambar' => 'images/materi/chapter3/months-of-the-year.jpg',
                'durasi' => '04:45',
            ],
            [
                'bab' => 3,
                'judul' => 'Chapter 3 - Days & Months',
                'subjudul' => 'Today, Tomorrow, Yesterday',
                'deskripsi' => 'Belajar konsep waktu sederhana.',
                'isi_materi' => 'Today is Monday. Tomorrow is Tuesday. Yesterday was Sunday.',
                'video' => 'videos/materi/chapter3/today-tomorrow-yesterday.mp4',
                'audio' => 'audio/materi/days.mp3',
                'gambar' => 'images/materi/chapter3/today-tomorrow-yesterday.jpg',
                'durasi' => '04:15',
            ],
            [
                'bab' => 3,
                'judul' => 'Chapter 3 - Days & Months',
                'subjudul' => 'Dates',
                'deskripsi' => 'Belajar menyebutkan tanggal.',
                'isi_materi' => 'Today is the first of January. My birthday is on the tenth of May.',
                'video' => 'videos/materi/chapter3/dates.mp4',
                'audio' => 'audio/materi/months.mp3',
                'gambar' => 'images/materi/chapter3/dates.jpg',
                'durasi' => '05:10',
            ],
            [
                'bab' => 3,
                'judul' => 'Chapter 3 - Days & Months',
                'subjudul' => 'Class Schedule',
                'deskripsi' => 'Belajar jadwal pelajaran sederhana.',
                'isi_materi' => 'English class is on Monday. Sports is on Friday.',
                'video' => 'videos/materi/chapter3/class-schedule.mp4',
                'audio' => 'audio/materi/days.mp3',
                'gambar' => 'images/materi/chapter3/class-schedule.jpg',
                'durasi' => '04:50',
            ],
            [
                'bab' => 3,
                'judul' => 'Chapter 3 - Days & Months',
                'subjudul' => 'Important Events',
                'deskripsi' => 'Belajar menyebutkan acara penting.',
                'isi_materi' => 'Independence Day is in August. New Year is in January.',
                'video' => 'videos/materi/chapter3/important-events.mp4',
                'audio' => 'audio/materi/months.mp3',
                'gambar' => 'images/materi/chapter3/important-events.jpg',
                'durasi' => '05:00',
            ],

            /*
            |--------------------------------------------------------------------------
            | CHAPTER 4 - FAMILY & OBJECTS
            |--------------------------------------------------------------------------
            */

            [
                'bab' => 4,
                'judul' => 'Chapter 4 - Family & Objects',
                'subjudul' => 'Family Members',
                'deskripsi' => 'Belajar anggota keluarga.',
                'isi_materi' => 'Father, Mother, Brother, Sister, Grandfather, Grandmother.',
                'video' => 'videos/materi/chapter4/family-members.mp4',
                'audio' => 'audio/materi/objects.mp3',
                'gambar' => 'images/materi/chapter4/family-members.jpg',
                'durasi' => '05:15',
            ],
            [
                'bab' => 4,
                'judul' => 'Chapter 4 - Family & Objects',
                'subjudul' => 'Introducing My Family',
                'deskripsi' => 'Belajar memperkenalkan keluarga.',
                'isi_materi' => 'This is my father. Her name is Siti. He is my brother.',
                'video' => 'videos/materi/chapter4/introducing-my-family.mp4',
                'audio' => 'audio/materi/objects.mp3',
                'gambar' => 'images/materi/chapter4/introducing-my-family.jpg',
                'durasi' => '05:20',
            ],
            [
                'bab' => 4,
                'judul' => 'Chapter 4 - Family & Objects',
                'subjudul' => 'Classroom Objects',
                'deskripsi' => 'Belajar benda di kelas.',
                'isi_materi' => 'Book, Pencil, Eraser, Bag, Chair, Table, Whiteboard.',
                'video' => 'videos/materi/chapter4/classroom-objects.mp4',
                'audio' => 'audio/materi/objects.mp3',
                'gambar' => 'images/materi/chapter4/classroom-objects.jpg',
                'durasi' => '04:40',
            ],
            [
                'bab' => 4,
                'judul' => 'Chapter 4 - Family & Objects',
                'subjudul' => 'Things at Home',
                'deskripsi' => 'Belajar benda di rumah.',
                'isi_materi' => 'Door, Window, Bed, Lamp, Plate, Spoon, Table.',
                'video' => 'videos/materi/chapter4/things-at-home.mp4',
                'audio' => 'audio/materi/objects.mp3',
                'gambar' => 'images/materi/chapter4/things-at-home.jpg',
                'durasi' => '04:50',
            ],
            [
                'bab' => 4,
                'judul' => 'Chapter 4 - Family & Objects',
                'subjudul' => 'This, That, These, Those',
                'deskripsi' => 'Belajar kata tunjuk.',
                'isi_materi' => 'This is a book. That is a table. These are pencils. Those are chairs.',
                'video' => 'videos/materi/chapter4/this-that-these-those.mp4',
                'audio' => 'audio/materi/objects.mp3',
                'gambar' => 'images/materi/chapter4/this-that-these-those.jpg',
                'durasi' => '05:30',
            ],
            [
                'bab' => 4,
                'judul' => 'Chapter 4 - Family & Objects',
                'subjudul' => 'Simple Description',
                'deskripsi' => 'Belajar mendeskripsikan orang dan benda.',
                'isi_materi' => 'My mother is kind. The bag is blue. The chair is big.',
                'video' => 'videos/materi/chapter4/simple-description.mp4',
                'audio' => 'audio/materi/objects.mp3',
                'gambar' => 'images/materi/chapter4/simple-description.jpg',
                'durasi' => '05:00',
            ],

            /*
            |--------------------------------------------------------------------------
            | CHAPTER 5 - DAILY ACTIVITIES
            |--------------------------------------------------------------------------
            */

            [
                'bab' => 5,
                'judul' => 'Chapter 5 - Daily Activities',
                'subjudul' => 'Morning Activities',
                'deskripsi' => 'Belajar aktivitas pagi hari.',
                'isi_materi' => 'I wake up at 5 a.m. I take a bath. I have breakfast.',
                'video' => 'videos/materi/chapter5/morning-activities.mp4',
                'audio' => 'audio/materi/introduction.mp3',
                'gambar' => 'images/materi/chapter5/morning-activities.jpg',
                'durasi' => '05:10',
            ],
            [
                'bab' => 5,
                'judul' => 'Chapter 5 - Daily Activities',
                'subjudul' => 'School Activities',
                'deskripsi' => 'Belajar aktivitas di sekolah.',
                'isi_materi' => 'I study at school. I read books. I write in my notebook.',
                'video' => 'videos/materi/chapter5/school-activities.mp4',
                'audio' => 'audio/materi/introduction.mp3',
                'gambar' => 'images/materi/chapter5/school-activities.jpg',
                'durasi' => '05:20',
            ],
            [
                'bab' => 5,
                'judul' => 'Chapter 5 - Daily Activities',
                'subjudul' => 'Afternoon Activities',
                'deskripsi' => 'Belajar aktivitas siang dan sore.',
                'isi_materi' => 'I go home in the afternoon. I play with my friends. I help my parents.',
                'video' => 'videos/materi/chapter5/afternoon-activities.mp4',
                'audio' => 'audio/materi/introduction.mp3',
                'gambar' => 'images/materi/chapter5/afternoon-activities.jpg',
                'durasi' => '05:00',
            ],
            [
                'bab' => 5,
                'judul' => 'Chapter 5 - Daily Activities',
                'subjudul' => 'Evening Activities',
                'deskripsi' => 'Belajar aktivitas malam hari.',
                'isi_materi' => 'I do my homework. I have dinner. I go to sleep.',
                'video' => 'videos/materi/chapter5/evening-activities.mp4',
                'audio' => 'audio/materi/introduction.mp3',
                'gambar' => 'images/materi/chapter5/evening-activities.jpg',
                'durasi' => '04:45',
            ],
            [
                'bab' => 5,
                'judul' => 'Chapter 5 - Daily Activities',
                'subjudul' => 'Simple Present Tense',
                'deskripsi' => 'Belajar pola kalimat aktivitas harian.',
                'isi_materi' => 'I go to school every day. She studies English. They play football.',
                'video' => 'videos/materi/chapter5/simple-present-tense.mp4',
                'audio' => 'audio/materi/introduction.mp3',
                'gambar' => 'images/materi/chapter5/simple-present-tense.jpg',
                'durasi' => '06:00',
            ],
            [
                'bab' => 5,
                'judul' => 'Chapter 5 - Daily Activities',
                'subjudul' => 'Daily Routine Paragraph',
                'deskripsi' => 'Belajar membuat paragraf kegiatan harian.',
                'isi_materi' => 'I wake up at five o\'clock. Then I take a bath, eat breakfast, and go to school. In the evening, I study and sleep early.',
                'video' => 'videos/materi/chapter5/daily-routine-paragraph.mp4',
                'audio' => 'audio/materi/introduction.mp3',
                'gambar' => 'images/materi/chapter5/daily-routine-paragraph.jpg',
                'durasi' => '06:20',
            ],
        ];

        foreach ($materi as $item) {
            DB::table('materi')->updateOrInsert(
                [
                    'bab' => $item['bab'],
                    'subjudul' => $item['subjudul'],
                ],
                [
                    'judul' => $item['judul'],
                    'deskripsi' => $item['deskripsi'],
                    'isi_materi' => $item['isi_materi'],
                    'video' => $item['video'],
                    'audio' => $item['audio'],
                    'gambar' => $item['gambar'],
                    'durasi' => $item['durasi'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }
    }
}