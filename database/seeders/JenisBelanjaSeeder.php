<?php

namespace Database\Seeders;

use App\Models\JenisBelanja;
use Illuminate\Database\Seeder;

class JenisBelanjaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JenisBelanja::create(['nama' => 'ARK']);
        JenisBelanja::create(['nama' => 'ATK']);
        JenisBelanja::create(['nama' => 'ATK & COMP. SUPPLIES']);
        JenisBelanja::create(['nama' => 'BARANG MODAL']);
        JenisBelanja::create(['nama' => 'BARANG/JASA']);
        JenisBelanja::create(['nama' => 'COMPUTER SUPPLIE']);
        JenisBelanja::create(['nama' => 'GAJI & TUNJANGAN']);
        JenisBelanja::create(['nama' => 'HONOR']);
        JenisBelanja::create(['nama' => 'KONSUMSI']);
        JenisBelanja::create(['nama' => 'LEMBUR']);
        JenisBelanja::create(['nama' => 'OPERASIONAL']);
        JenisBelanja::create(['nama' => 'PAKET DATA']);
        JenisBelanja::create(['nama' => 'PAKET MEETING']);
        JenisBelanja::create(['nama' => 'PEMELIHARAAN']);
        JenisBelanja::create(['nama' => 'PENCETAKAN']);
        JenisBelanja::create(['nama' => 'PENGIRIMAN']);
        JenisBelanja::create(['nama' => 'PERJALANAN DINAS']);
        JenisBelanja::create(['nama' => 'PERJALANAN DINAS DALAM KOTA']);
        JenisBelanja::create(['nama' => 'PERJALANAN PELATIHAN']);
        JenisBelanja::create(['nama' => 'PERLENGKAPAN PELATIHAN']);
        JenisBelanja::create(['nama' => 'TRANSPORT LOKAL']);
        JenisBelanja::create(['nama' => 'UANG HARIAN PELATIHAN']);
        JenisBelanja::create(['nama' => 'LAINNYA']);
        JenisBelanja::create(['nama' => 'REFOCUSING']);
        JenisBelanja::create(['nama' => 'REVISI DIPA']);

    }
}
