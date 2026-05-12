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
            | CHAPTER 0 - THE BEGINNING
            |--------------------------------------------------------------------------
            */
            [
                'bab'        => 0,
                'judul'      => 'Chapter 0 - The Beginning',
                'subjudul'   => 'Alphabet',
                'deskripsi'  => 'Belajar huruf A sampai Z dan cara pengucapannya dalam bahasa Inggris.',
                'isi_materi' => "Alfabet bahasa Inggris terdiri dari 26 huruf:\nA (ei), B (bi), C (si), D (di), E (i), F (ef), G (ji), H (eich), I (ai), J (jei), K (kei), L (el), M (em), N (en), O (ou), P (pi), Q (kyu), R (ar), S (es), T (ti), U (yu), V (vi), W (dabliyu), X (eks), Y (wai), Z (zi).\n\nHuruf vokal: A, E, I, O, U\nHuruf konsonan: B, C, D, F, G, H, J, K, L, M, N, P, Q, R, S, T, V, W, X, Y, Z",
                'video'      => 'videos/materi/chapter0/alphabet.mp4',
                'audio'      => 'audio/materi/alphabet.mp3',
                'gambar'     => 'images/materi/chapter0/alphabet.jpg',
                'durasi'     => 6,
            ],
            [
                'bab'        => 0,
                'judul'      => 'Chapter 0 - The Beginning',
                'subjudul'   => 'Numbers',
                'deskripsi'  => 'Belajar angka 1 sampai 20 dan puluhan dalam bahasa Inggris.',
                'isi_materi' => "Angka 1-10:\n1 = One, 2 = Two, 3 = Three, 4 = Four, 5 = Five\n6 = Six, 7 = Seven, 8 = Eight, 9 = Nine, 10 = Ten\n\nAngka 11-20:\n11 = Eleven, 12 = Twelve, 13 = Thirteen, 14 = Fourteen, 15 = Fifteen\n16 = Sixteen, 17 = Seventeen, 18 = Eighteen, 19 = Nineteen, 20 = Twenty\n\nPuluhan:\n30 = Thirty, 40 = Forty, 50 = Fifty, 60 = Sixty\n70 = Seventy, 80 = Eighty, 90 = Ninety, 100 = One hundred",
                'video'      => 'videos/materi/chapter0/numbers.mp4',
                'audio'      => 'audio/materi/numbers.mp3',
                'gambar'     => 'images/materi/chapter0/numbers.jpg',
                'durasi'     => 5,
            ],
            [
                'bab'        => 0,
                'judul'      => 'Chapter 0 - The Beginning',
                'subjudul'   => 'Colors',
                'deskripsi'  => 'Belajar nama-nama warna dalam bahasa Inggris.',
                'isi_materi' => "Warna dasar:\nRed (Merah), Blue (Biru), Yellow (Kuning), Green (Hijau)\nBlack (Hitam), White (Putih)\n\nWarna tambahan:\nBrown (Cokelat), Pink (Merah muda), Purple (Ungu)\nOrange (Oranye), Gray (Abu-abu)\n\nContoh kalimat:\n- The sky is blue. (Langit berwarna biru.)\n- The apple is red. (Apel berwarna merah.)\n- My bag is black. (Tasku berwarna hitam.)",
                'video'      => 'videos/materi/chapter0/colors.mp4',
                'audio'      => 'audio/materi/colors.mp3',
                'gambar'     => 'images/materi/chapter0/colors.jpg',
                'durasi'     => 4,
            ],
            [
                'bab'        => 0,
                'judul'      => 'Chapter 0 - The Beginning',
                'subjudul'   => 'Days and Months',
                'deskripsi'  => 'Belajar nama hari dan bulan dalam bahasa Inggris.',
                'isi_materi' => "Hari dalam seminggu:\nMonday (Senin), Tuesday (Selasa), Wednesday (Rabu)\nThursday (Kamis), Friday (Jumat), Saturday (Sabtu), Sunday (Minggu)\n\nBulan dalam setahun:\nJanuary (Januari), February (Februari), March (Maret)\nApril (April), May (Mei), June (Juni)\nJuly (Juli), August (Agustus), September (September)\nOctober (Oktober), November (November), December (Desember)\n\nContoh kalimat:\n- Today is Monday. (Hari ini adalah Senin.)\n- My birthday is in August. (Ulang tahunku di bulan Agustus.)",
                'video'      => 'videos/materi/chapter0/days-months.mp4',
                'audio'      => 'audio/materi/days.mp3',
                'gambar'     => 'images/materi/chapter0/days-months.jpg',
                'durasi'     => 5,
            ],
            [
                'bab'        => 0,
                'judul'      => 'Chapter 0 - The Beginning',
                'subjudul'   => 'Family Members',
                'deskripsi'  => 'Belajar nama-nama anggota keluarga dalam bahasa Inggris.',
                'isi_materi' => "Anggota keluarga inti:\nFather / Dad (Ayah), Mother / Mom (Ibu)\nBrother (Kakak/Adik laki-laki), Sister (Kakak/Adik perempuan)\n\nAnggota keluarga besar:\nGrandfather / Grandpa (Kakek), Grandmother / Grandma (Nenek)\nUncle (Paman), Aunt (Bibi), Cousin (Sepupu)\n\nContoh kalimat:\n- This is my father. His name is Budi.\n- I have one brother and two sisters.\n- My grandmother lives in Manado.",
                'video'      => 'videos/materi/chapter0/family.mp4',
                'audio'      => 'audio/materi/family.mp3',
                'gambar'     => 'images/materi/chapter0/family.jpg',
                'durasi'     => 5,
            ],

            /*
            |--------------------------------------------------------------------------
            | CHAPTER 1 - ABOUT ME
            |--------------------------------------------------------------------------
            */
            [
                'bab'        => 1,
                'judul'      => 'Chapter 1 - About Me',
                'subjudul'   => 'Greetings and Farewells',
                'deskripsi'  => 'Belajar salam dan perpisahan formal maupun informal dalam bahasa Inggris.',
                'isi_materi' => "Salam (Greetings):\n- Good morning (Selamat pagi) → digunakan pukul 00.00 - 12.00\n- Good afternoon (Selamat siang) → digunakan pukul 12.00 - 18.00\n- Good evening (Selamat malam/sore) → digunakan pukul 18.00 ke atas\n- Hello / Hi → salam informal, bisa digunakan kapan saja\n\nMenanyakan kabar:\n- How are you? → Apa kabar?\n- How do you do? → formal\n- Jawaban: I am fine, thank you. / I am great! / Not bad.\n\nPerpisahan (Farewells):\n- Goodbye / Bye (Selamat tinggal)\n- See you later (Sampai jumpa nanti)\n- See you tomorrow (Sampai jumpa besok)\n- Take care (Jaga diri baik-baik)\n- Good night (Selamat malam) → saat berpisah di malam hari\n\nContoh dialog:\nA: Good morning, Sinta!\nB: Good morning, Galang! How are you?\nA: I am fine, thank you. And you?\nB: I am great too!\nA: See you in class!\nB: See you!",
                'video'      => 'videos/materi/chapter1/greetings.mp4',
                'audio'      => 'audio/materi/chapter1/greetings.mp3',
                'gambar'     => 'images/materi/chapter1/greetings.jpg',
                'durasi'     => 7,
            ],
            [
                'bab'        => 1,
                'judul'      => 'Chapter 1 - About Me',
                'subjudul'   => 'Introducing Yourself',
                'deskripsi'  => 'Belajar cara memperkenalkan diri sendiri dalam bahasa Inggris.',
                'isi_materi' => "Ekspresi memperkenalkan diri:\n- My name is ... (Nama saya adalah ...)\n- I am ... (Saya adalah ...)\n- My full name is ... (Nama lengkap saya adalah ...)\n- You can call me ... (Kamu bisa memanggilku ...)\n- I am from ... (Saya berasal dari ...)\n- I live in ... (Saya tinggal di ...)\n- I am ... years old. (Saya berumur ... tahun.)\n- I study at ... (Saya belajar di ...)\n- My hobby is ... (Hobi saya adalah ...)\n- Nice to meet you! (Senang bertemu denganmu!)\n- Nice to meet you too! (Senang bertemu denganmu juga!)\n\nKosakata penting:\n- Name = Nama\n- Age = Umur\n- Address = Alamat\n- Hobby = Hobi\n- School = Sekolah\n\nContoh perkenalan diri:\nHello! My name is Galang. I am from Kalimantan. I am twelve years old. I study at SMP Negeri 8 Bitung. My hobby is fishing. Nice to meet you all!",
                'video'      => 'videos/materi/chapter1/introducing-yourself.mp4',
                'audio'      => 'audio/materi/chapter1/introducing-yourself.mp3',
                'gambar'     => 'images/materi/chapter1/introducing-yourself.jpg',
                'durasi'     => 8,
            ],
            [
                'bab'        => 1,
                'judul'      => 'Chapter 1 - About Me',
                'subjudul'   => 'Introducing Others',
                'deskripsi'  => 'Belajar cara memperkenalkan orang lain dalam bahasa Inggris.',
                'isi_materi' => "Ekspresi memperkenalkan orang lain:\n- This is ... (Ini adalah ...)\n- His name is ... (Namanya [laki-laki] adalah ...)\n- Her name is ... (Namanya [perempuan] adalah ...)\n- He is my friend. (Dia adalah temanku [laki-laki].)\n- She is my friend. (Dia adalah temanku [perempuan].)\n- He/She is from ... (Dia berasal dari ...)\n- Let me introduce you to ... (Izinkan saya memperkenalkan kamu kepada ...)\n\nPenggunaan He dan She:\n- He → untuk laki-laki\n- She → untuk perempuan\n\nContoh dialog:\nA: Mika, this is my friend, Sinta.\nB: Hi Sinta! Nice to meet you.\nC: Hi Mika! Nice to meet you too.\nA: Sinta is from Manado. She loves dancing.\nB: Oh really? That is interesting!",
                'video'      => 'videos/materi/chapter1/introducing-others.mp4',
                'audio'      => 'audio/materi/chapter1/introducing-others.mp3',
                'gambar'     => 'images/materi/chapter1/introducing-others.jpg',
                'durasi'     => 7,
            ],
            [
                'bab'        => 1,
                'judul'      => 'Chapter 1 - About Me',
                'subjudul'   => 'Personal Information',
                'deskripsi'  => 'Belajar menyebutkan dan menanyakan informasi pribadi dalam bahasa Inggris.',
                'isi_materi' => "Menanyakan informasi pribadi:\n- What is your name? (Siapa namamu?)\n- Where are you from? (Kamu dari mana?)\n- Where do you live? (Kamu tinggal di mana?)\n- How old are you? (Berapa umurmu?)\n- What is your hobby? (Apa hobimu?)\n- What school do you go to? (Kamu sekolah di mana?)\n\nMenjawab pertanyaan informasi pribadi:\n- My name is Galang. (Nama saya Galang.)\n- I am from Kalimantan. (Saya dari Kalimantan.)\n- I live in Bitung. (Saya tinggal di Bitung.)\n- I am twelve years old. (Saya dua belas tahun.)\n- My hobby is fishing. (Hobi saya memancing.)\n- I go to SMP Negeri 8 Bitung. (Saya sekolah di SMP Negeri 8 Bitung.)\n\nKosakata hobi:\nReading (Membaca), Drawing (Menggambar), Singing (Menyanyi)\nDancing (Menari), Cooking (Memasak), Playing football (Bermain sepak bola)\nSwimming (Berenang), Fishing (Memancing), Cycling (Bersepeda)",
                'video'      => 'videos/materi/chapter1/personal-information.mp4',
                'audio'      => 'audio/materi/chapter1/personal-information.mp3',
                'gambar'     => 'images/materi/chapter1/personal-information.jpg',
                'durasi'     => 8,
            ],
            [
                'bab'        => 1,
                'judul'      => 'Chapter 1 - About Me',
                'subjudul'   => 'Adjectives to Describe People',
                'deskripsi'  => 'Belajar kata sifat untuk mendeskripsikan orang.',
                'isi_materi' => "Kata sifat untuk mendeskripsikan penampilan:\n- Tall (Tinggi) ↔ Short (Pendek)\n- Fat / Chubby (Gemuk) ↔ Thin / Slim (Kurus/Langsing)\n- Long hair (Rambut panjang) ↔ Short hair (Rambut pendek)\n- Curly hair (Rambut keriting) / Straight hair (Rambut lurus)\n\nKata sifat untuk mendeskripsikan kepribadian:\n- Kind (Baik hati), Friendly (Ramah), Funny (Lucu)\n- Smart (Pintar), Brave (Berani), Honest (Jujur)\n- Diligent (Rajin), Creative (Kreatif), Patient (Sabar)\n\nStruktur kalimat:\nSubject + is/am/are + adjective\n- She is kind. (Dia baik hati.)\n- He is tall. (Dia tinggi.)\n- I am friendly. (Saya ramah.)\n- They are smart. (Mereka pintar.)\n\nContoh deskripsi:\nThis is my friend, Sinta. She is tall and has long straight hair. She is kind, friendly, and very smart. I like being her friend.",
                'video'      => 'videos/materi/chapter1/adjectives-people.mp4',
                'audio'      => 'audio/materi/chapter1/adjectives-people.mp3',
                'gambar'     => 'images/materi/chapter1/adjectives-people.jpg',
                'durasi'     => 8,
            ],
            [
                'bab'        => 1,
                'judul'      => 'Chapter 1 - About Me',
                'subjudul'   => 'Simple Present Tense - To Be',
                'deskripsi'  => 'Belajar penggunaan am, is, dan are dalam kalimat perkenalan.',
                'isi_materi' => "To Be: AM - IS - ARE\n\nPenggunaan:\n- I → AM\n- He / She / It → IS\n- You / We / They → ARE\n\nContoh kalimat positif (+):\n- I am a student. (Saya seorang pelajar.)\n- She is my friend. (Dia adalah temanku.)\n- We are classmates. (Kami adalah teman sekelas.)\n\nKalimat negatif (-):\nSubject + is/am/are + NOT\n- I am not from Jakarta. (Saya bukan dari Jakarta.)\n- He is not tall. (Dia tidak tinggi.)\n- They are not lazy. (Mereka tidak malas.)\n\nKalimat tanya (?):\nIs/Am/Are + Subject + ...?\n- Are you a student? Yes, I am. / No, I am not.\n- Is she your friend? Yes, she is. / No, she is not.\n- Am I late? Yes, you are. / No, you are not.",
                'video'      => 'videos/materi/chapter1/to-be.mp4',
                'audio'      => 'audio/materi/chapter1/to-be.mp3',
                'gambar'     => 'images/materi/chapter1/to-be.jpg',
                'durasi'     => 10,
            ],

            /*
            |--------------------------------------------------------------------------
            | CHAPTER 2 - CULINARY AND ME
            |--------------------------------------------------------------------------
            */
            [
                'bab'        => 2,
                'judul'      => 'Chapter 2 - Culinary and Me',
                'subjudul'   => 'Food and Drinks Vocabulary',
                'deskripsi'  => 'Belajar kosakata makanan dan minuman favorit dalam bahasa Inggris.',
                'isi_materi' => "Makanan (Food):\n- Rice (Nasi), Noodles (Mie), Bread (Roti)\n- Chicken (Ayam), Fish (Ikan), Egg (Telur)\n- Vegetables (Sayuran), Fruit (Buah)\n- Soup (Sup), Fried rice (Nasi goreng)\n- Satay (Sate), Rendang, Gado-gado\n\nMinuman (Drinks):\n- Water (Air putih), Milk (Susu), Juice (Jus)\n- Tea (Teh), Coffee (Kopi)\n- Coconut water (Air kelapa)\n\nCamilan (Snacks):\n- Chips (Keripik), Crackers (Kerupuk)\n- Cake (Kue), Biscuit (Biskuit), Candy (Permen)\n\nContoh kalimat:\n- My favorite food is fried rice. (Makanan favoritku adalah nasi goreng.)\n- I like to drink coconut water. (Saya suka minum air kelapa.)\n- Rendang is a traditional food from West Sumatra.",
                'video'      => 'videos/materi/chapter2/food-drinks.mp4',
                'audio'      => 'audio/materi/chapter2/food-drinks.mp3',
                'gambar'     => 'images/materi/chapter2/food-drinks.jpg',
                'durasi'     => 8,
            ],
            [
                'bab'        => 2,
                'judul'      => 'Chapter 2 - Culinary and Me',
                'subjudul'   => 'Taste and Texture',
                'deskripsi'  => 'Belajar kata-kata untuk mendeskripsikan rasa dan tekstur makanan.',
                'isi_materi' => "Rasa (Taste):\n- Sweet (Manis) → cake, candy, chocolate\n- Sour (Asam) → lemon, vinegar, tamarind\n- Salty (Asin) → chips, crackers, salted fish\n- Bitter (Pahit) → coffee, bitter melon\n- Spicy (Pedas) → chili, pepper, sambal\n- Savory (Gurih) → rendang, fried chicken\n- Bland (Hambar) → plain rice, plain water\n\nTekstur (Texture):\n- Crunchy (Renyah) → chips, crackers\n- Soft (Lembut) → bread, tofu\n- Chewy (Kenyal) → mochi, sticky rice\n- Crispy (Garing) → fried food\n- Sticky (Lengket) → glutinous rice\n- Greasy (Berminyak) → fried food\n- Smooth (Halus) → pudding, ice cream\n\nContoh kalimat:\n- Satay is savory and a little bit spicy.\n- I love crunchy chips.\n- This soup tastes sour and spicy.\n- The bread is soft and sweet.",
                'video'      => 'videos/materi/chapter2/taste-texture.mp4',
                'audio'      => 'audio/materi/chapter2/taste-texture.mp3',
                'gambar'     => 'images/materi/chapter2/taste-texture.jpg',
                'durasi'     => 8,
            ],
            [
                'bab'        => 2,
                'judul'      => 'Chapter 2 - Culinary and Me',
                'subjudul'   => 'Expressing Preferences',
                'deskripsi'  => 'Belajar cara mengungkapkan makanan dan minuman favorit.',
                'isi_materi' => "Mengungkapkan kesukaan:\n- I like ... (Saya suka ...)\n- I love ... (Saya sangat suka ...)\n- My favorite food is ... (Makanan favoritku adalah ...)\n- My favorite drink is ... (Minuman favoritku adalah ...)\n- I prefer ... to ... (Saya lebih suka ... daripada ...)\n\nMengungkapkan ketidaksukaan:\n- I don't like ... (Saya tidak suka ...)\n- I dislike ... (Saya tidak suka ...)\n- I hate ... (Saya sangat tidak suka ...)\n\nMenanyakan preferensi:\n- What is your favorite food? (Apa makanan favoritmu?)\n- Do you like spicy food? (Apakah kamu suka makanan pedas?)\n- Which do you prefer, rice or noodles? (Mana yang kamu suka, nasi atau mie?)\n\nContoh dialog:\nA: What is your favorite food, Sinta?\nB: My favorite food is gado-gado. It is savory and healthy.\nA: Do you like spicy food?\nB: Yes, I do! I love sambal. What about you?\nA: I prefer sweet food. I love chocolate cake.",
                'video'      => 'videos/materi/chapter2/expressing-preferences.mp4',
                'audio'      => 'audio/materi/chapter2/expressing-preferences.mp3',
                'gambar'     => 'images/materi/chapter2/expressing-preferences.jpg',
                'durasi'     => 8,
            ],
            [
                'bab'        => 2,
                'judul'      => 'Chapter 2 - Culinary and Me',
                'subjudul'   => 'Simple Present Tense - Action Verbs',
                'deskripsi'  => 'Belajar kata kerja aksi dalam kalimat simple present tense.',
                'isi_materi' => "Kata kerja aksi yang berkaitan dengan makanan:\n- Eat (Makan), Drink (Minum), Cook (Memasak)\n- Buy (Membeli), Order (Memesan), Try (Mencoba)\n- Taste (Mencicipi), Enjoy (Menikmati)\n\nStruktur Simple Present Tense:\n(+) Subject + Verb 1 (tambah -s/-es untuk he/she/it)\n(-) Subject + do/does + not + Verb 1\n(?) Do/Does + Subject + Verb 1?\n\nContoh kalimat:\n- I eat rice every day. (Saya makan nasi setiap hari.)\n- She cooks fried rice every morning. (Dia memasak nasi goreng setiap pagi.)\n- He does not like spicy food. (Dia tidak suka makanan pedas.)\n- Do you drink milk every day? Yes, I do.\n- Does she cook at home? No, she does not.\n\nPenambahan -s/-es:\n- eat → eats (untuk he/she/it)\n- cook → cooks\n- go → goes\n- watch → watches\n- study → studies (huruf y → ies)",
                'video'      => 'videos/materi/chapter2/simple-present-action.mp4',
                'audio'      => 'audio/materi/chapter2/simple-present-action.mp3',
                'gambar'     => 'images/materi/chapter2/simple-present-action.jpg',
                'durasi'     => 10,
            ],
            [
                'bab'        => 2,
                'judul'      => 'Chapter 2 - Culinary and Me',
                'subjudul'   => 'Describing Food in a Paragraph',
                'deskripsi'  => 'Belajar menulis paragraf deskriptif tentang makanan favorit.',
                'isi_materi' => "Cara menulis paragraf deskripsi makanan:\n1. Sebutkan nama makanan\n2. Jelaskan asal makanan (jika ada)\n3. Deskripsikan tampilan\n4. Deskripsikan rasa dan tekstur\n5. Ungkapkan mengapa kamu menyukainya\n\nKata penghubung (Connectors):\n- First (Pertama), Then (Kemudian), Also (Juga)\n- It is ... (Ini adalah ...), It has ... (Ini memiliki ...)\n- I like it because ... (Saya menyukainya karena ...)\n\nContoh paragraf:\nMy favorite food is soto. Soto is a traditional Indonesian soup. It has a yellow broth with chicken, vegetables, and noodles. The taste is savory and a little bit spicy. I love soto because it is warm and delicious. My mother cooks soto every Sunday morning.",
                'video'      => 'videos/materi/chapter2/food-paragraph.mp4',
                'audio'      => 'audio/materi/chapter2/food-paragraph.mp3',
                'gambar'     => 'images/materi/chapter2/food-paragraph.jpg',
                'durasi'     => 8,
            ],

            /*
            |--------------------------------------------------------------------------
            | CHAPTER 3 - HOME SWEET HOME
            |--------------------------------------------------------------------------
            */
            [
                'bab'        => 3,
                'judul'      => 'Chapter 3 - Home Sweet Home',
                'subjudul'   => 'Rooms in a House',
                'deskripsi'  => 'Belajar nama-nama ruangan di dalam rumah dalam bahasa Inggris.',
                'isi_materi' => "Ruangan-ruangan di rumah:\n- Bedroom (Kamar tidur)\n- Living room (Ruang tamu/keluarga)\n- Kitchen (Dapur)\n- Bathroom / Toilet (Kamar mandi)\n- Dining room (Ruang makan)\n- Study room (Ruang belajar)\n- Garage (Garasi)\n- Garden / Yard (Taman/Halaman)\n- Balcony (Balkon)\n- Laundry room (Ruang cuci)\n\nMendeskripsikan ruangan:\n- In the bedroom, there is a bed and a wardrobe.\n- The kitchen is next to the dining room.\n- There are two bathrooms in my house.\n\nPreposisi tempat:\n- In (Di dalam)\n- On (Di atas permukaan)\n- Under (Di bawah)\n- Next to (Di sebelah)\n- Behind (Di belakang)\n- In front of (Di depan)\n- Between (Di antara)\n\nContoh kalimat:\n- The table is in the dining room.\n- My bed is next to the window.\n- The shoes are under the bed.",
                'video'      => 'videos/materi/chapter3/rooms.mp4',
                'audio'      => 'audio/materi/chapter3/rooms.mp3',
                'gambar'     => 'images/materi/chapter3/rooms.jpg',
                'durasi'     => 8,
            ],
            [
                'bab'        => 3,
                'judul'      => 'Chapter 3 - Home Sweet Home',
                'subjudul'   => 'Things in a House',
                'deskripsi'  => 'Belajar nama benda-benda yang ada di dalam rumah.',
                'isi_materi' => "Benda di kamar tidur:\n- Bed (Tempat tidur), Pillow (Bantal), Blanket (Selimut)\n- Wardrobe (Lemari), Mirror (Cermin), Lamp (Lampu)\n- Desk (Meja belajar), Chair (Kursi)\n\nBenda di dapur:\n- Refrigerator (Kulkas), Stove (Kompor), Sink (Wastafel)\n- Pot (Panci), Pan (Wajan), Knife (Pisau)\n- Plate (Piring), Bowl (Mangkuk), Spoon (Sendok), Fork (Garpu)\n\nBenda di ruang tamu:\n- Sofa (Sofa), Table (Meja), Television (Televisi)\n- Bookshelf (Rak buku), Curtain (Gorden), Carpet (Karpet)\n- Clock (Jam dinding), Vase (Vas bunga)\n\nContoh kalimat:\n- There is a television in the living room.\n- The refrigerator is in the kitchen.\n- My books are on the desk.",
                'video'      => 'videos/materi/chapter3/things-in-house.mp4',
                'audio'      => 'audio/materi/chapter3/things-in-house.mp3',
                'gambar'     => 'images/materi/chapter3/things-in-house.jpg',
                'durasi'     => 8,
            ],
            [
                'bab'        => 3,
                'judul'      => 'Chapter 3 - Home Sweet Home',
                'subjudul'   => 'There is and There are',
                'deskripsi'  => 'Belajar menggunakan there is dan there are untuk mendeskripsikan isi ruangan.',
                'isi_materi' => "Penggunaan THERE IS dan THERE ARE:\n\nTHERE IS → untuk benda tunggal (singular)\nTHERE ARE → untuk benda jamak (plural)\n\nKalimat positif (+):\n- There is a bed in my bedroom. (Ada sebuah tempat tidur di kamar tidurku.)\n- There are two chairs in the kitchen. (Ada dua kursi di dapur.)\n\nKalimat negatif (-):\n- There is not (isn't) a TV in my room.\n- There are not (aren't) any books on the table.\n\nKalimat tanya (?):\n- Is there a bathroom upstairs? Yes, there is. / No, there isn't.\n- Are there any windows in the room? Yes, there are. / No, there aren't.\n\nContoh deskripsi ruangan:\nThis is my bedroom. There is a bed near the window. There is a desk in the corner. There are many books on the shelf. There is also a lamp on my desk. I love my bedroom because it is cozy and quiet.",
                'video'      => 'videos/materi/chapter3/there-is-there-are.mp4',
                'audio'      => 'audio/materi/chapter3/there-is-there-are.mp3',
                'gambar'     => 'images/materi/chapter3/there-is-there-are.jpg',
                'durasi'     => 10,
            ],
            [
                'bab'        => 3,
                'judul'      => 'Chapter 3 - Home Sweet Home',
                'subjudul'   => 'Household Activities',
                'deskripsi'  => 'Belajar kosakata pekerjaan rumah tangga dalam bahasa Inggris.',
                'isi_materi' => "Pekerjaan rumah tangga (Household chores):\n- Sweep the floor (Menyapu lantai)\n- Mop the floor (Mengepel lantai)\n- Wash the dishes (Mencuci piring)\n- Cook (Memasak)\n- Do the laundry (Mencuci pakaian)\n- Iron the clothes (Menyetrika pakaian)\n- Clean the room (Membersihkan kamar)\n- Make the bed (Merapikan tempat tidur)\n- Take out the trash (Membuang sampah)\n- Water the plants (Menyiram tanaman)\n\nContoh kalimat:\n- I sweep the floor every morning.\n- My mother washes the dishes after dinner.\n- We do the laundry on Sunday.\n\nContoh dialog:\nA: Can you help me clean the room?\nB: Sure! I will sweep the floor.\nA: Thank you! I will make the bed.\nB: Let us work together!",
                'video'      => 'videos/materi/chapter3/household-activities.mp4',
                'audio'      => 'audio/materi/chapter3/household-activities.mp3',
                'gambar'     => 'images/materi/chapter3/household-activities.jpg',
                'durasi'     => 8,
            ],
            [
                'bab'        => 3,
                'judul'      => 'Chapter 3 - Home Sweet Home',
                'subjudul'   => 'Describing My House',
                'deskripsi'  => 'Belajar menulis paragraf deskriptif tentang rumah.',
                'isi_materi' => "Cara menulis deskripsi rumah:\n1. Sebutkan jenis rumah\n2. Jelaskan lokasi\n3. Deskripsikan bagian luar\n4. Deskripsikan ruangan-ruangan di dalam\n5. Ungkapkan perasaanmu tentang rumah\n\nKata sifat untuk rumah:\n- Big (Besar) ↔ Small (Kecil)\n- Comfortable / Cozy (Nyaman)\n- Clean (Bersih) ↔ Messy (Berantakan)\n- Bright (Terang) ↔ Dark (Gelap)\n- Modern (Modern) ↔ Traditional (Tradisional)\n- New (Baru) ↔ Old (Lama)\n\nContoh paragraf deskripsi rumah:\nMy house is not very big, but it is comfortable. It is located in Bitung, North Sulawesi. My house has three bedrooms, one kitchen, one living room, and two bathrooms. In the living room, there is a sofa, a television, and some bookshelves. My favorite room is my bedroom because it is quiet and cozy. I love my house very much.",
                'video'      => 'videos/materi/chapter3/describing-house.mp4',
                'audio'      => 'audio/materi/chapter3/describing-house.mp3',
                'gambar'     => 'images/materi/chapter3/describing-house.jpg',
                'durasi'     => 8,
            ],

            /*
            |--------------------------------------------------------------------------
            | CHAPTER 4 - MY SCHOOL ACTIVITIES
            |--------------------------------------------------------------------------
            */
            [
                'bab'        => 4,
                'judul'      => 'Chapter 4 - My School Activities',
                'subjudul'   => 'School Subjects',
                'deskripsi'  => 'Belajar nama mata pelajaran di sekolah dalam bahasa Inggris.',
                'isi_materi' => "Mata pelajaran (School subjects):\n- Mathematics / Math (Matematika)\n- Science / Natural Science (IPA)\n- Social Science (IPS)\n- Indonesian Language (Bahasa Indonesia)\n- English (Bahasa Inggris)\n- Physical Education / PE (Pendidikan Jasmani)\n- Art (Seni Budaya)\n- Civics (PKN)\n- Religion (Pendidikan Agama)\n- History (Sejarah)\n- Geography (Geografi)\n- Computer Science (Informatika)\n\nMenanyakan tentang mata pelajaran:\n- What is your favorite subject? (Apa mata pelajaran favoritmu?)\n- I like English because it is interesting.\n- I find Math difficult but useful.\n\nContoh jadwal pelajaran:\n- Monday: English, Math, Science, PE\n- Tuesday: Indonesian, Art, Social Science, Religion\n- Wednesday: English, Math, Computer Science, Civics\n\nContoh kalimat:\n- My favorite subject is English.\n- I have Math class on Monday and Wednesday.\n- Science is interesting because we do experiments.",
                'video'      => 'videos/materi/chapter4/school-subjects.mp4',
                'audio'      => 'audio/materi/chapter4/school-subjects.mp3',
                'gambar'     => 'images/materi/chapter4/school-subjects.jpg',
                'durasi'     => 8,
            ],
            [
                'bab'        => 4,
                'judul'      => 'Chapter 4 - My School Activities',
                'subjudul'   => 'Telling Time',
                'deskripsi'  => 'Belajar cara menyebutkan waktu dalam bahasa Inggris.',
                'isi_materi' => "Cara menyebutkan waktu:\n\nTepat (O\'clock):\n- 07.00 = It is seven o\'clock.\n- 08.00 = It is eight o\'clock.\n\nLewat (Past):\n- 07.15 = It is fifteen past seven. / It is quarter past seven.\n- 07.30 = It is thirty past seven. / It is half past seven.\n\nKurang (To):\n- 07.45 = It is quarter to eight.\n- 07.50 = It is ten to eight.\n\nMenanyakan waktu:\n- What time is it? (Jam berapa sekarang?)\n- What time does school start? (Jam berapa sekolah mulai?)\n\nKosakata waktu:\n- In the morning (Di pagi hari)\n- In the afternoon (Di siang/sore hari)\n- In the evening (Di malam hari)\n- At night (Di malam hari)\n\nContoh kalimat:\n- School starts at seven o\'clock in the morning.\n- English class is at half past eight.\n- We have lunch at twelve o\'clock.",
                'video'      => 'videos/materi/chapter4/telling-time.mp4',
                'audio'      => 'audio/materi/chapter4/telling-time.mp3',
                'gambar'     => 'images/materi/chapter4/telling-time.jpg',
                'durasi'     => 8,
            ],
            [
                'bab'        => 4,
                'judul'      => 'Chapter 4 - My School Activities',
                'subjudul'   => 'Daily School Routine',
                'deskripsi'  => 'Belajar tentang rutinitas harian di sekolah menggunakan simple present tense.',
                'isi_materi' => "Rutinitas di sekolah:\n- Arrive at school (Tiba di sekolah)\n- Greet the teacher (Menyapa guru)\n- Attend class (Mengikuti pelajaran)\n- Take notes (Mencatat)\n- Read books (Membaca buku)\n- Do assignments (Mengerjakan tugas)\n- Have lunch (Makan siang)\n- Play with friends (Bermain dengan teman)\n- Go home (Pulang)\n\nKata keterangan frekuensi:\n- Always (Selalu) → 100%\n- Usually (Biasanya) → 80%\n- Often (Sering) → 60%\n- Sometimes (Kadang-kadang) → 40%\n- Rarely (Jarang) → 20%\n- Never (Tidak pernah) → 0%\n\nPosisi kata keterangan frekuensi:\nSubject + frequency adverb + verb\n- I always arrive at school at seven.\n- She usually takes notes in class.\n- We sometimes play basketball after school.\n- He never comes late.\n\nContoh paragraf:\nEvery day, I wake up at five o\'clock. I always have breakfast before going to school. I usually arrive at school at six forty-five. My first class starts at seven o\'clock. I often take notes during the lesson. At twelve o\'clock, I have lunch with my friends. I go home at two o\'clock in the afternoon.",
                'video'      => 'videos/materi/chapter4/daily-school-routine.mp4',
                'audio'      => 'audio/materi/chapter4/daily-school-routine.mp3',
                'gambar'     => 'images/materi/chapter4/daily-school-routine.jpg',
                'durasi'     => 10,
            ],
            [
                'bab'        => 4,
                'judul'      => 'Chapter 4 - My School Activities',
                'subjudul'   => 'Online and Offline Learning',
                'deskripsi'  => 'Belajar kosakata dan ekspresi tentang pembelajaran daring dan luring.',
                'isi_materi' => "Pembelajaran daring (Online learning):\n- Online class (Kelas online/daring)\n- Video call (Panggilan video)\n- Application: Zoom, Google Meet, Google Classroom\n- Internet connection (Koneksi internet)\n- Laptop / Computer / Smartphone (Perangkat)\n- Submit assignment online (Mengumpulkan tugas online)\n\nPembelajaran luring (Offline learning):\n- Face-to-face class (Kelas tatap muka)\n- Classroom (Ruang kelas)\n- Whiteboard (Papan tulis)\n- Textbook (Buku teks)\n- Worksheet (Lembar kerja)\n\nPerbandingan:\n- Online learning is flexible but we need a good internet connection.\n- Offline learning is more interactive because we can meet our friends and teachers directly.\n\nContoh dialog:\nA: Do you prefer online or offline learning?\nB: I prefer offline learning because I can ask questions directly.\nA: I see. But online learning is also good because we can study from home.\nB: That is true. Both have their advantages.",
                'video'      => 'videos/materi/chapter4/online-offline-learning.mp4',
                'audio'      => 'audio/materi/chapter4/online-offline-learning.mp3',
                'gambar'     => 'images/materi/chapter4/online-offline-learning.jpg',
                'durasi'     => 8,
            ],
            [
                'bab'        => 4,
                'judul'      => 'Chapter 4 - My School Activities',
                'subjudul'   => 'Study Habits',
                'deskripsi'  => 'Belajar mengungkapkan kebiasaan belajar yang baik dalam bahasa Inggris.',
                'isi_materi' => "Kebiasaan belajar yang baik:\n- Study regularly (Belajar secara teratur)\n- Make a schedule (Membuat jadwal)\n- Take notes (Mencatat)\n- Review the lesson (Mengulang pelajaran)\n- Ask questions (Bertanya)\n- Read books (Membaca buku)\n- Do homework on time (Mengerjakan PR tepat waktu)\n- Avoid distractions (Menghindari gangguan)\n\nContoh kalimat tentang kebiasaan belajar:\n- I always study for two hours every evening.\n- She reviews her notes before the exam.\n- We read the textbook before class.\n- He never forgets to do his homework.\n\nTips belajar bahasa Inggris:\n1. Listen to English songs or podcasts.\n2. Watch English movies with subtitles.\n3. Practice speaking with friends.\n4. Write a diary in English.\n5. Read English books or articles.\n\nContoh dialog:\nA: How do you study for the English exam?\nB: I usually review my notes and practice reading aloud.\nA: That sounds effective! Do you also watch English movies?\nB: Yes! It really helps me understand better.",
                'video'      => 'videos/materi/chapter4/study-habits.mp4',
                'audio'      => 'audio/materi/chapter4/study-habits.mp3',
                'gambar'     => 'images/materi/chapter4/study-habits.jpg',
                'durasi'     => 8,
            ],

            /*
            |--------------------------------------------------------------------------
            | CHAPTER 5 - THIS IS MY SCHOOL
            |--------------------------------------------------------------------------
            */
            [
                'bab'        => 5,
                'judul'      => 'Chapter 5 - This is My School',
                'subjudul'   => 'School Buildings and Facilities',
                'deskripsi'  => 'Belajar nama gedung dan fasilitas di sekolah dalam bahasa Inggris.',
                'isi_materi' => "Gedung dan fasilitas sekolah:\n- Classroom (Ruang kelas)\n- Library (Perpustakaan)\n- Laboratory (Laboratorium)\n- Computer lab (Lab komputer)\n- Principal\'s office (Ruang kepala sekolah)\n- Teacher\'s office (Ruang guru)\n- School canteen (Kantin sekolah)\n- Sports field (Lapangan olahraga)\n- Basketball court (Lapangan basket)\n- Auditorium / Hall (Aula)\n- Prayer room (Musholla/Tempat ibadah)\n- Toilet / Restroom (Toilet)\n- Parking lot (Tempat parkir)\n- Garden (Taman)\n\nMenanyakan lokasi:\n- Where is the library? (Di mana perpustakaannya?)\n- How do I get to the computer lab? (Bagaimana cara ke lab komputer?)\n\nMemberikan petunjuk arah:\n- Go straight. (Jalan lurus.)\n- Turn left / right. (Belok kiri/kanan.)\n- It is next to ... (Lokasinya di sebelah ...)\n- It is in front of ... (Lokasinya di depan ...)\n- It is behind ... (Lokasinya di belakang ...)\n\nContoh dialog:\nA: Excuse me, where is the library?\nB: Go straight and turn left. It is next to the laboratory.\nA: Thank you!\nB: You are welcome.",
                'video'      => 'videos/materi/chapter5/school-buildings.mp4',
                'audio'      => 'audio/materi/chapter5/school-buildings.mp3',
                'gambar'     => 'images/materi/chapter5/school-buildings.jpg',
                'durasi'     => 8,
            ],
            [
                'bab'        => 5,
                'judul'      => 'Chapter 5 - This is My School',
                'subjudul'   => 'Extracurricular Activities',
                'deskripsi'  => 'Belajar kosakata dan ekspresi tentang kegiatan ekstrakurikuler.',
                'isi_materi' => "Kegiatan ekstrakurikuler:\nOlahraga (Sports):\n- Football / Soccer (Sepak bola)\n- Basketball (Basket)\n- Volleyball (Voli)\n- Badminton (Bulu tangkis)\n- Swimming (Renang)\n- Martial arts (Seni bela diri)\n\nSeni dan Budaya (Arts):\n- Traditional dance (Tari tradisional)\n- Choir / Singing club (Paduan suara)\n- Drama club (Teater)\n- Drawing / Painting (Menggambar/Melukis)\n- Batik making (Membatik)\n\nAkademik:\n- English club (Klub bahasa Inggris)\n- Science club (Klub sains)\n- Math club (Klub matematika)\n- Debate club (Klub debat)\n\nPramuka:\n- Scout (Pramuka)\n\nMenanyakan kegiatan ekstrakurikuler:\n- What extracurricular activities do you join? (Kamu ikut ekskul apa?)\n- I join the English club and football team.\n- Why do you choose that activity? (Kenapa kamu memilih kegiatan itu?)\n- Because I love English and it helps me improve my skills.\n\nContoh dialog:\nA: What extracurricular do you join, Galang?\nB: I join the football team and scout. What about you?\nA: I join the English club and traditional dance.\nB: That sounds great! When do you practice?\nA: English club is on Tuesday, and dance is on Thursday afternoon.",
                'video'      => 'videos/materi/chapter5/extracurricular.mp4',
                'audio'      => 'audio/materi/chapter5/extracurricular.mp3',
                'gambar'     => 'images/materi/chapter5/extracurricular.jpg',
                'durasi'     => 8,
            ],
            [
                'bab'        => 5,
                'judul'      => 'Chapter 5 - This is My School',
                'subjudul'   => 'School Rules',
                'deskripsi'  => 'Belajar peraturan sekolah menggunakan must dan must not.',
                'isi_materi' => "Peraturan sekolah menggunakan MUST dan MUST NOT:\n\nMUST → Harus (kewajiban)\nMUST NOT → Tidak boleh (larangan)\n\nPeraturan sekolah (School rules):\n- You must wear a school uniform. (Kamu harus memakai seragam sekolah.)\n- You must arrive at school on time. (Kamu harus tiba di sekolah tepat waktu.)\n- You must respect your teachers. (Kamu harus menghormati gurumu.)\n- You must do your homework. (Kamu harus mengerjakan PR.)\n- You must keep the school clean. (Kamu harus menjaga kebersihan sekolah.)\n\n- You must not be late. (Kamu tidak boleh terlambat.)\n- You must not bring mobile phones to class. (Kamu tidak boleh membawa HP ke kelas.)\n- You must not fight with other students. (Kamu tidak boleh berkelahi.)\n- You must not litter. (Kamu tidak boleh membuang sampah sembarangan.)\n- You must not cheat during exams. (Kamu tidak boleh menyontek saat ujian.)\n\nContoh dialog:\nA: Can I use my phone during class?\nB: No! You must not use your phone in class.\nA: What if there is an emergency?\nB: You must ask permission from the teacher first.",
                'video'      => 'videos/materi/chapter5/school-rules.mp4',
                'audio'      => 'audio/materi/chapter5/school-rules.mp3',
                'gambar'     => 'images/materi/chapter5/school-rules.jpg',
                'durasi'     => 8,
            ],
            [
                'bab'        => 5,
                'judul'      => 'Chapter 5 - This is My School',
                'subjudul'   => 'School Festival',
                'deskripsi'  => 'Belajar kosakata dan ekspresi terkait perayaan dan festival sekolah.',
                'isi_materi' => "Festival dan perayaan di sekolah:\n- School anniversary (HUT sekolah)\n- Science exhibition (Pameran sains)\n- Art performance (Penampilan seni)\n- Sports day (Hari olahraga)\n- Cultural festival (Festival budaya)\n- Graduation ceremony (Upacara wisuda/kelulusan)\n- Flag ceremony (Upacara bendera)\n\nKegiatan dalam festival:\n- Perform a dance (Menampilkan tarian)\n- Sing a song (Menyanyikan lagu)\n- Act in a drama (Bermain drama)\n- Display science projects (Memamerkan proyek sains)\n- Play traditional games (Bermain permainan tradisional)\n\nMengungkapkan pendapat tentang festival:\n- The school festival was amazing!\n- I enjoyed the traditional dance performance.\n- Our class won the science competition.\n- I am proud of our school.\n\nContoh dialog:\nA: Did you enjoy the school festival yesterday?\nB: Yes! It was amazing! I performed a traditional dance.\nA: Really? That must be exciting!\nB: It was! Our school also had a science exhibition. Did you see it?\nA: Yes, I did! Your project was very creative.\nB: Thank you! I am proud of our team.",
                'video'      => 'videos/materi/chapter5/school-festival.mp4',
                'audio'      => 'audio/materi/chapter5/school-festival.mp3',
                'gambar'     => 'images/materi/chapter5/school-festival.jpg',
                'durasi'     => 8,
            ],
            [
                'bab'        => 5,
                'judul'      => 'Chapter 5 - This is My School',
                'subjudul'   => 'Describing My School',
                'deskripsi'  => 'Belajar menulis paragraf deskriptif tentang sekolah.',
                'isi_materi' => "Cara menulis deskripsi sekolah:\n1. Sebutkan nama sekolah\n2. Jelaskan lokasi\n3. Deskripsikan bangunan dan fasilitas\n4. Ceritakan kegiatan di sekolah\n5. Ungkapkan perasaanmu tentang sekolah\n\nKata sifat untuk sekolah:\n- Big / Large (Besar), Small (Kecil)\n- Clean (Bersih), Beautiful (Indah)\n- Comfortable (Nyaman), Friendly (Ramah)\n- Modern (Modern), Complete (Lengkap)\n\nContoh paragraf deskripsi sekolah:\nMy school is SMP Negeri 8 Bitung. It is located in Bitung, North Sulawesi. My school is not very big, but it is clean and comfortable. There are twelve classrooms, a library, a computer laboratory, a sports field, and a canteen. The teachers are kind and helpful. We also have many extracurricular activities such as football, English club, and traditional dance. Every year, our school holds a cultural festival where students can show their talents. I am happy to be a student at SMP Negeri 8 Bitung.",
                'video'      => 'videos/materi/chapter5/describing-school.mp4',
                'audio'      => 'audio/materi/chapter5/describing-school.mp3',
                'gambar'     => 'images/materi/chapter5/describing-school.jpg',
                'durasi'     => 10,
            ],
        ];

        foreach ($materi as $item) {
            DB::table('materi')->updateOrInsert(
                [
                    'bab'      => $item['bab'],
                    'subjudul' => $item['subjudul'],
                ],
                [
                    'judul'      => $item['judul'],
                    'deskripsi'  => $item['deskripsi'],
                    'isi_materi' => $item['isi_materi'],
                    'video'      => $item['video'],
                    'audio'      => $item['audio'],
                    'gambar'     => $item['gambar'],
                    'durasi'     => $item['durasi'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }
    }
}