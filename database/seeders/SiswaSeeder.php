<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class SiswaSeeder extends Seeder
{
    public function run(): void
    {
        $siswa7A = [
            'ADELEAN HILALA',
            'CHRISTEN LOVELICA KAGUANSEHE',
            'CIFAS MASALA',
            'CRISNI MAKAPIA',
            'ELSISANTI TUNDU',
            'FARLINA PANGADILAN',
            'FRENGKI PITER',
            'JANWAR KASALUHE',
            'JASTIN PEKADE',
            'LAFENDRI LESAR ADILANG',
            'RESSA PAMUNDALENG',
            'SELLY AYU SABANARI',
            'SERGIO MANGALEHE',
            'STIVENLY MAKIGAWE',
            'VIERVANDI LAHEA',
            'YEHEZKIEL LENGKEY',
        ];

        $siswa7B = [
            'KENLI TAMPILANG',
            'DEBORA SAHABAT',
            'VELIN TAKAHONSELANG',
            'JELITA MANOPO',
            'DILAN MAMITADE',
            'MERSI HERMANSES',
            'NOVENDRI KAHIMPONG',
            'CHRISTIAN PANURAT',
            'MEISYA KATIANDAGHO',
            'DEVITA MAKAPIA',
            'CLARISSA LALOH',
            'CLAUDIA SABANARI',
            'ELSAFORAN TUNDU',
            'BRIAN GUNENA',
            'SALSABILA LUMIAP',
            'IFONIA LALELE',
            'TAUFIK UMAR',
        ];

        // Buat akun siswa 7A
        foreach ($siswa7A as $index => $nama) {
            $username = strtolower(str_replace(' ', '.', $nama));
            $email    = strtolower(str_replace(' ', '', $nama)) . '@siswa.com';
            $nis      = '7A' . str_pad($index + 1, 3, '0', STR_PAD_LEFT);

            User::updateOrCreate(
                ['email' => $email],
                [
                    'name'      => $nama,
                    'nis'       => $nis,
                    'username'  => $username,
                    'email'     => $email,
                    'password'  => Hash::make('siswa123'),
                    'kelas'     => '7A',
                    'role'      => 'siswa',
                    'is_active' => true,
                ]
            );
        }

        // Buat akun siswa 7B
        foreach ($siswa7B as $index => $nama) {
            $username = strtolower(str_replace(' ', '.', $nama));
            $email    = strtolower(str_replace(' ', '', $nama)) . '@siswa.com';
            $nis      = '7B' . str_pad($index + 1, 3, '0', STR_PAD_LEFT);

            User::updateOrCreate(
                ['email' => $email],
                [
                    'name'      => $nama,
                    'nis'       => $nis,
                    'username'  => $username,
                    'email'     => $email,
                    'password'  => Hash::make('siswa123'),
                    'kelas'     => '7B',
                    'role'      => 'siswa',
                    'is_active' => true,
                ]
            );
        }

        $this->command->info('✅ 33 akun siswa berhasil dibuat!');
        $this->command->info('Password default: siswa123');
    }
}