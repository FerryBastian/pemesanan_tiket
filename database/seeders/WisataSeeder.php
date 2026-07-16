<?php

namespace Database\Seeders;

use App\Models\Wisata;
use Illuminate\Database\Seeder;

class WisataSeeder extends Seeder
{
    public function run(): void
    {
        $wisatas = [
            [
                'nama' => 'Danau Toba',
                'deskripsi' => 'Danau vulkanik terbesar di Asia Tenggara, terletak di Kabupaten Samosir dan sekitarnya. Menawarkan pemandangan alam pegunungan, budaya Batak, serta aktivitas air seperti berperahu dan berenang.',
                'foto' => 'images/wisata/toba.jpg',
                'video_url' => 'https://youtu.be/ojw2VEkh42E?si=5lGyj8yYdF7r3U0h',
                'harga_tiket' => 15000,
            ],
            [
                'nama' => 'Bukit Lawang',
                'deskripsi' => 'Kawasan di tepi Taman Nasional Gunung Leuser, Kabupaten Langkat, terkenal sebagai pusat rehabilitasi orangutan Sumatra dan jalur trekking hutan tropis.',
                'foto' => 'images/wisata/lawang.jpg',
                'video_url' => 'https://youtu.be/5GmJrATZWt8?si=sNgPYn57RRP4SCiw',
                'harga_tiket' => 20000,
            ],
            [
                'nama' => 'Berastagi (Bukit Gundaling)',
                'deskripsi' => 'Kota wisata dataran tinggi Karo dengan udara sejuk, diapit Gunung Sibayak dan Gunung Sinabung. Bukit Gundaling menjadi spot favorit menikmati panorama pegunungan.',
                'foto' => 'images/wisata/gundaling.jpg',
                'video_url' => 'https://youtu.be/sHVIFbxEc5Q?si=39sMxgntprUUPblm',
                'harga_tiket' => 10000,
            ],
        ];

        foreach ($wisatas as $wisata) {
            Wisata::updateOrCreate(['nama' => $wisata['nama']], $wisata);
        }
    }
}