<?php

namespace Database\Seeders;

use App\Models\Pengaduan;
use App\Models\Pengumuman;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class
        ]);
        $pengaduans = [
            [
                'judul' => 'Jalan Rusak',
                'isi' => 'Banyak lubang besar di sepanjang jalan',
                'lokasi' => 'Jalan Diponegoro',
                'tanggapan' => 2,
                'foto_tanggapan' => 'laporan1.jpg'
            ]
        ];
        foreach ($pengaduans as $value) {
            Pengaduan::create($value);
        }
        $pengumumans = [
            [
                'judul' => 'Pemadaman Lampu',
                'isi' => 'Akan terjadi pemadaman lampu pada pukul 09.00-10.00 
                        di area Wonokromo dan sekitarnya karena ada penurunan voltase listrik'
            ]
        ];
        foreach ($pengumumans as $value) {
            Pengumuman::create($value);
        }
    }
}
