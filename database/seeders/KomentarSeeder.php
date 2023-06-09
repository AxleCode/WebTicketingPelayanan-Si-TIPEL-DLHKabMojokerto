<?php

namespace Database\Seeders;

use App\Models\Komentar;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KomentarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Komentar::create([
            'laporan_id' => '1',
            'komentar' => 'kami terima aduannya',
            'file' => '',
            'updated_at' => '2023-02-17 08:37:02',
            'status' => '1',
        ]);
        Komentar::create([
            'laporan_id' => '1',
            'komentar' => 'survey lokasi dulu',
            'file' => '',
            'updated_at' => '2023-02-18 08:37:02',
            'status' => '2',
        ]);
        Komentar::create([
            'laporan_id' => '1',
            'komentar' => 'udah diangkut',
            'file' => 'sip.jpg',
            'updated_at' => '2023-02-19 08:37:02',
            'status' => '3',
        ]);

        Komentar::create([
            'laporan_id' => '1',
            'komentar' => 'udah bersih',
            'file' => 'bersih.jpg',
            'updated_at' => '2023-02-19 10:37:02',
            'status' => '99',
        ]);
    }
}
