<?php

namespace Database\Seeders;

use App\Models\Aktivitas;
use App\Models\Detil;
use App\Models\Komponen;
use App\Models\Kro;
use App\Models\Program;
use App\Models\Ro;
use App\Models\Subkomponen;
use Illuminate\Database\Seeder;

class PokSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $program1 = Program::create(['kode' => '054.01.GG', 'deskripsi' => 'Program Penyediaan dan Pelayanan Informasi Statistik', 'jumlah' => 0, 'posisi' => 0]);
        $aktivitas1 = Aktivitas::create(['kode' => '2896', 'deskripsi' => 'Pengembangan dan Analisis Statistik', 'jumlah' => 0, 'posisi' => 0, 'program_id' => $program1->kode]);
        $kro1 = Kro::create(['kode' => '2896.BMA', 'deskripsi' => 'Data dan Informasi Publik', 'jumlah' => 0, 'posisi' => 0, 'aktivitas_id' => $aktivitas1->kode]);
        $ro1 = Ro::create(['kode' => '2896.BMA.004', 'deskripsi' => 'PUBLIKASI/LAPORAN ANALISIS DAN PENGEMBANGAN STATISTIK', 'jumlah' => 0, 'posisi' => 0, 'kro_id' => $kro1->kode]);
        $komponen1 = Komponen::create(['kode' => '051', 'deskripsi' => 'PERSIAPAN', 'jumlah' => 0, 'posisi' => 0, 'ro_id' => $ro1->kode]);
        $subkomponen1 = Subkomponen::create(['kode' => '521811', 'deskripsi' => 'Belanja Barang Persediaan Barang Konsumsi', 'jumlah' => 0, 'posisi' => 0, 'komponen_id' => $komponen1->id]);
        $detil1 = Detil::create(['deskripsi' => 'Pengadaan Atk Dan Komputer Supplies', 'jumlah' => 2000000, 'posisi' => 0, 'subkomponen_id' => $subkomponen1->id, 'volume' => 1, 'satuan' => 'PAKET', 'jenis_belanja_id' => 1, 'fungsi_id' => 1, 'harga_satuan' => 100000]);
        $subkomponen2 = Subkomponen::create(['kode' => '522151', 'deskripsi' => 'Belanja Jasa Profesi', 'jumlah' => 0, 'posisi' => 0, 'komponen_id' => $komponen1->id]);
        $detil2 = Detil::create(['deskripsi' => 'Honor narasumber eselon ii/yang disetarakan', 'jumlah' => 12000000, 'posisi' => 0, 'subkomponen_id' => $subkomponen2->id, 'volume' => 12, 'satuan' => 'O-J', 'jenis_belanja_id' => 1, 'fungsi_id' => 1, 'harga_satuan' => 100000]);
        $detil3 = Detil::create(['deskripsi' => 'Honor narasumber eselon III ke bawah/yang disetarakan', 'jumlah' => 3600000, 'posisi' => 0, 'subkomponen_id' => $subkomponen2->id, 'volume' => 4, 'satuan' => 'O-J', 'jenis_belanja_id' => 1, 'fungsi_id' => 1, 'harga_satuan' => 100000]);
    }
}
