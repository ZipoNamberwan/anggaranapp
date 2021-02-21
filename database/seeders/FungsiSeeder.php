<?php

namespace Database\Seeders;

use App\Models\Fungsi;
use Illuminate\Database\Seeder;

class FungsiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Fungsi::create(['nama' => 'Bagian Umum']);
        Fungsi::create(['nama' => 'Fungsi Sosial']);
        Fungsi::create(['nama' => 'Fungsi Produksi']);
        Fungsi::create(['nama' => 'Fungsi Distribusi']);
        Fungsi::create(['nama' => 'Fungsi NWAS']);
        Fungsi::create(['nama' => 'Fungsi IPDS']);
    }
}
