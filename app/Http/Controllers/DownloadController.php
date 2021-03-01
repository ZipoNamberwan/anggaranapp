<?php

namespace App\Http\Controllers;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use App\Models\Aktivitas;
use App\Models\Detil;
use App\Models\Komponen;
use App\Models\Kro;
use App\Models\Program;
use App\Models\Ro;
use App\Models\Subkomponen;

class DownloadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('download.index');
    }

    public function download()
    {
        $pokitems = collect();
        $programs = Program::all()->sortBy('posisi');
        foreach ($programs as $program) {
            $program->jenis = 'program';
            $pokitems = $pokitems->push($program);
            $aktivitases = Aktivitas::where(['program_id' => $program->kode])->get()->sortBy('posisi');
            foreach ($aktivitases as $aktivitas) {
                $aktivitas->jenis = 'aktivitas';
                $pokitems = $pokitems->push($aktivitas);
                $kros = Kro::where(['aktivitas_id' => $aktivitas->kode])->get()->sortBy('posisi');
                foreach ($kros as $kro) {
                    $kro->jenis = 'kro';
                    $pokitems = $pokitems->push($kro);
                    $ros = Ro::where(['kro_id' => $kro->kode])->get()->sortBy('posisi');
                    foreach ($ros as $ro) {
                        $ro->jenis = 'ro';
                        $pokitems = $pokitems->push($ro);
                        $komponens = Komponen::where(['ro_id' => $ro->kode])->get()->sortBy('posisi');
                        foreach ($komponens as $komponen) {
                            $komponen->jenis = 'komponen';
                            $pokitems = $pokitems->push($komponen);
                            $subkomponens = Subkomponen::where(['komponen_id' => $komponen->id])->get()->sortBy('posisi');
                            foreach ($subkomponens as $subkomponen) {
                                $subkomponen->jenis = 'subkomponen';
                                $pokitems = $pokitems->push($subkomponen);
                                $detils = Detil::where(['subkomponen_id' => $subkomponen->id])->get()->sortBy('posisi');
                                foreach ($detils as $detil) {
                                    $detil->jenis = 'detil';
                                    $pokitems = $pokitems->push($detil);
                                }
                            }
                        }
                    }
                }
            }
        }

        //$reader = new \PhpOffice\PhpSpreadsheet\IOFactory();
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load('template.xlsx');
        //$spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setTitle('RPD dan LDS');

        $row = 6;

        foreach ($pokitems as $pokitem) {
            if ($pokitem->jenis == 'program') {
                $sheet->setCellValue('C' . $row, $pokitem->kode);
                $sheet->mergeCells('C' . $row . ':H' . $row);
                $sheet->setCellValue('I' . $row, $pokitem->deskripsi);
                $sheet->setCellValue('M' . $row, $pokitem->jumlah);
                $sheet->getStyle('C' . $row . ':AT' . $row)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('ffC4D79B');
            } else if ($pokitem->jenis == 'aktivitas') {
                $sheet->setCellValue('D' . $row, $pokitem->kode);
                $sheet->mergeCells('D' . $row . ':H' . $row);
                $sheet->setCellValue('I' . $row, $pokitem->deskripsi);
                $sheet->setCellValue('M' . $row, $pokitem->jumlah);
                $sheet->getStyle('C' . $row . ':AT' . $row)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('ff92CDDC');
            } else if ($pokitem->jenis == 'kro') {
                $sheet->setCellValue('E' . $row, $pokitem->kode);
                $sheet->mergeCells('E' . $row . ':H' . $row);
                $sheet->setCellValue('I' . $row, $pokitem->deskripsi);
                $sheet->setCellValue('J' . $row, $pokitem->volume);
                $sheet->setCellValue('K' . $row, $pokitem->satuan);
                $sheet->setCellValue('M' . $row, $pokitem->jumlah);
                $sheet->getStyle('C' . $row . ':AT' . $row)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('ffE6B8B7');
            } else if ($pokitem->jenis == 'ro') {
                $sheet->setCellValue('F' . $row, $pokitem->kode);
                $sheet->mergeCells('F' . $row . ':H' . $row);
                $sheet->setCellValue('I' . $row, $pokitem->deskripsi);
                $sheet->setCellValue('M' . $row, $pokitem->jumlah);
                $sheet->getStyle('C' . $row . ':AT' . $row)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('ffF9DB6F');
            } else if ($pokitem->jenis == 'komponen') {
                $sheet->setCellValue('G' . $row, $pokitem->kode);
                $sheet->mergeCells('G' . $row . ':H' . $row);
                $sheet->setCellValue('I' . $row, $pokitem->deskripsi);
                $sheet->setCellValue('M' . $row, $pokitem->jumlah);
            } else if ($pokitem->jenis == 'subkomponen') {
                $sheet->setCellValue('H' . $row, $pokitem->kode);
                $sheet->setCellValue('I' . $row, $pokitem->deskripsi);
                $sheet->setCellValue('M' . $row, $pokitem->jumlah);
            } else if ($pokitem->jenis == 'detil') {
                $sheet->setCellValue('A' . $row, $pokitem->jenisbelanja->nama);
                $sheet->setCellValue('B' . $row, $pokitem->fungsi->nama);
                $sheet->setCellValue('I' . $row, $pokitem->deskripsi);
                $sheet->setCellValue('J' . $row, $pokitem->volume);
                $sheet->setCellValue('K' . $row, $pokitem->satuan);
                if ($pokitem->volume && $pokitem->jumlah) {
                    $sheet->setCellValue('L' . $row, $pokitem->jumlah / $pokitem->volume);
                }
                $sheet->setCellValue('M' . $row, $pokitem->jumlah);

                $sheet->setCellValue('N' . $row, $pokitem->jan_rpd);
                $sheet->setCellValue('O' . $row, $pokitem->jan_lds);
                $sheet->setCellValue('P' . $row, $pokitem->feb_rpd);
                $sheet->setCellValue('Q' . $row, $pokitem->feb_lds);
                $sheet->setCellValue('R' . $row, $pokitem->mar_rpd);
                $sheet->setCellValue('S' . $row, $pokitem->mar_lds);
                $sheet->setCellValue('T' . $row, $pokitem->apr_rpd);
                $sheet->setCellValue('U' . $row, $pokitem->apr_lds);
                $sheet->setCellValue('V' . $row, $pokitem->mei_rpd);
                $sheet->setCellValue('W' . $row, $pokitem->mei_lds);
                $sheet->setCellValue('X' . $row, $pokitem->jun_rpd);
                $sheet->setCellValue('Y' . $row, $pokitem->jun_lds);
                $sheet->setCellValue('Z' . $row, $pokitem->jul_rpd);
                $sheet->setCellValue('AA' . $row, $pokitem->jul_lds);
                $sheet->setCellValue('AB' . $row, $pokitem->agu_rpd);
                $sheet->setCellValue('AC' . $row, $pokitem->agu_lds);
                $sheet->setCellValue('AD' . $row, $pokitem->sep_rpd);
                $sheet->setCellValue('AE' . $row, $pokitem->sep_lds);
                $sheet->setCellValue('AF' . $row, $pokitem->okt_rpd);
                $sheet->setCellValue('AG' . $row, $pokitem->okt_lds);
                $sheet->setCellValue('AH' . $row, $pokitem->nov_rpd);
                $sheet->setCellValue('AI' . $row, $pokitem->nov_lds);
                $sheet->setCellValue('AJ' . $row, $pokitem->des_rpd);
                $sheet->setCellValue('AK' . $row, $pokitem->des_lds);
            }

            $row++;
        }

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="test.xls"');
        header('Cache-Control: max-age=0');

        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xls');
        $writer->save('php://output');

        return 'dsadasd';
    }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     //
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     //
    // }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show($id)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit($id)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, $id)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy($id)
    // {
    //     //
    // }
}
