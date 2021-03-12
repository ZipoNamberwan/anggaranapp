<?php

namespace App\Http\Controllers;

use App\Models\Aktivitas;
use App\Models\Detil;
use App\Models\Fungsi;
use App\Models\JenisBelanja;
use App\Models\Komponen;
use App\Models\Kro;
use App\Models\Program;
use App\Models\Ro;
use App\Models\Subkomponen;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Ubah nilai $fungsi_id sesuai role, kalau role IPDS berarti $fungsi_id=6
        // kalo role sosial berarti $fungsi_id=2, dan seterusnya, kalo rolenya
        // adalah admin atau role viewer maka isikan nilai $fungsi_id=null 
        $fungsi_id = 6;

        $can_see_all = $fungsi_id ? false : true;
        $filter_array = $can_see_all ? array() : array('fungsi_id' => $fungsi_id);
        $is_shown = $can_see_all ? true : false;

        $pokitems = collect();
        $programs = Program::all()->sortBy('posisi');
        foreach ($programs as $program) {
            $program->jenis = 'program';
            $program->is_shown = $is_shown;
            $pokitems = $pokitems->push($program);
            $aktivitases = Aktivitas::where(['program_id' => $program->kode])->get()->sortBy('posisi');
            foreach ($aktivitases as $aktivitas) {
                $aktivitas->jenis = 'aktivitas';
                $aktivitas->is_shown = $is_shown;
                $pokitems = $pokitems->push($aktivitas);
                $kros = Kro::where(['aktivitas_id' => $aktivitas->kode])->get()->sortBy('posisi');
                foreach ($kros as $kro) {
                    $kro->jenis = 'kro';
                    $kro->is_shown = $is_shown;
                    $pokitems = $pokitems->push($kro);
                    $ros = Ro::where(['kro_id' => $kro->kode])->get()->sortBy('posisi');
                    foreach ($ros as $ro) {
                        $ro->jenis = 'ro';
                        $ro->is_shown = $is_shown;
                        $pokitems = $pokitems->push($ro);
                        $komponens = Komponen::where(['ro_id' => $ro->kode])->get()->sortBy('posisi');
                        foreach ($komponens as $komponen) {
                            $komponen->jenis = 'komponen';
                            $komponen->is_shown = $is_shown;
                            $pokitems = $pokitems->push($komponen);
                            $subkomponens = Subkomponen::where(['komponen_id' => $komponen->id])->get()->sortBy('posisi');
                            foreach ($subkomponens as $subkomponen) {
                                $subkomponen->jenis = 'subkomponen';
                                $subkomponen->is_shown = $is_shown;
                                $pokitems = $pokitems->push($subkomponen);
                                $filter_array['subkomponen_id'] = $subkomponen->id;
                                $detils = Detil::where($filter_array)->get()->sortBy('posisi');
                                if (count($detils) > 0 && !$can_see_all) {
                                    $program->is_shown = !$is_shown;
                                    $aktivitas->is_shown = !$is_shown;
                                    $kro->is_shown = !$is_shown;
                                    $ro->is_shown = !$is_shown;
                                    $komponen->is_shown = !$is_shown;
                                    $subkomponen->is_shown = !$is_shown;
                                }
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
        return view('pok.index', compact('pokitems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($type, $id)
    {
        if ($type == 'program') {
            $parent = Program::find($id);
            return view('pok.create-aktivitas', compact('type', 'parent'));
        } else if ($type == 'aktivitas') {
            $parent = Aktivitas::find($id);
            return view('pok.create-kro', compact('type', 'parent'));
        } else if ($type == 'kro') {
            $parent = Kro::find($id);
            return view('pok.create-ro', compact('type', 'parent'));
        } else if ($type == 'ro') {
            $parent = Ro::find($id);
            return view('pok.create-komponen', compact('type', 'parent'));
        } else if ($type == 'komponen') {
            $parent = Komponen::find($id);
            return view('pok.create-subkomponen', compact('type', 'parent'));
        } else if ($type == 'subkomponen') {
            $parent = Subkomponen::find($id);
            $departments = Fungsi::all();
            $detiltypes = JenisBelanja::all();
            return view('pok.create-detil', compact('type', 'parent', 'departments', 'detiltypes'));
        } else if ($type == 'root') {
            return view('pok.create-program', compact('type'));
        } else {
            abort(404);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validationArray = array(
            'name' => 'required',
            'id' => 'required',
            'total' => 'required|numeric'
        );

        $validationAttribute = array(
            'name' => 'Deskripsi',
            'id' => 'Kode',
            'total' => 'Jumlah'
        );

        if ($request->create_type == 'detil') {
            $validationArray['department'] = 'required';
            $validationArray['detiltype'] = 'required';
            $validationArray['volume'] = 'required|numeric';
            $validationArray['unit'] = 'required';
            $validationArray['unit_price'] = 'required|numeric';

            $validationAttribute['department'] = 'Fungsi';
            $validationAttribute['detiltype'] = 'Jenis Belanja';
            $validationAttribute['volume'] = 'Volume';
            $validationAttribute['unit'] = 'Satuan';
            $validationAttribute['unit_price'] = 'Harga Satuan';
        }

        $validator = Validator::make($request->all(), $validationArray, [], $validationAttribute);

        $validator->validate();

        if ($request->create_type == 'program') {
            $pos = count(Program::all());
            Program::create([
                'kode' => $request->id,
                'deskripsi' => $request->name,
                'jumlah' => $request->total,
                'posisi' => $pos
            ]);
            return redirect('/pok')->with('success-create', 'Program telah ditambah!');
        } else if ($request->create_type == 'aktivitas') {
            $pos = count(Aktivitas::where(['program_id' => $request->parent_id])->get());
            Aktivitas::create([
                'kode' => $request->id,
                'deskripsi' => $request->name,
                'jumlah' => $request->total,
                'program_id' => $request->parent_id,
                'posisi' => $pos
            ]);
            return redirect('/pok')->with('success-create', 'Aktivitas telah ditambah!');
        } else if ($request->create_type == 'kro') {
            $pos = count(Kro::where(['aktivitas_id' => $request->parent_id])->get());
            Kro::create([
                'kode' => $request->id,
                'deskripsi' => $request->name,
                'jumlah' => $request->total,
                'satuan' => $request->unit,
                'volume' => $request->volume,
                'aktivitas_id' => $request->parent_id,
                'posisi' => $pos
            ]);
            return redirect('/pok')->with('success-create', 'KRO telah ditambah!');
        } else if ($request->create_type == 'ro') {
            $pos = count(Ro::where(['kro_id' => $request->parent_id])->get());
            Ro::create([
                'kode' => $request->id,
                'deskripsi' => $request->name,
                'jumlah' => $request->total,
                'kro_id' => $request->parent_id,
                'posisi' => $pos
            ]);
            return redirect('/pok')->with('success-create', 'RO telah ditambah!');
        } else if ($request->create_type == 'komponen') {
            $pos = count(Komponen::where(['ro_id' => $request->parent_id])->get());
            Komponen::create([
                'kode' => $request->id,
                'deskripsi' => $request->name,
                'jumlah' => $request->total,
                'ro_id' => $request->parent_id,
                'posisi' => $pos
            ]);
            return redirect('/pok')->with('success-create', 'Komponen telah ditambah!');
        } else if ($request->create_type == 'subkomponen') {
            $pos = count(Subkomponen::where(['komponen_id' => $request->parent_id])->get());
            Subkomponen::create([
                'kode' => $request->id,
                'deskripsi' => $request->name,
                'jumlah' => $request->total,
                'komponen_id' => $request->parent_id,
                'posisi' => $pos
            ]);
            return redirect('/pok')->with('success-create', 'Sub Komponen telah ditambah!');
        } else if ($request->create_type == 'detil') {
            $pos = count(Detil::where(['subkomponen_id' => $request->parent_id])->get());
            Detil::create([
                'deskripsi' => $request->name,
                'jumlah' => $request->total,
                'satuan' => $request->unit,
                'volume' => $request->volume,
                'fungsi_id' => $request->department,
                'jenis_belanja_id' => $request->detiltype,
                'subkomponen_id' => $request->parent_id,
                'harga_satuan' => $request->unit_price,
                'posisi' => $pos
            ]);
            return redirect('/pok')->with('success-create', 'Detil telah ditambah!');
        } else {
            abort(404);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function rpd()
    {
        $fungsi_id = 6;

        $can_see_all = $fungsi_id ? false : true;
        $filter_array = $can_see_all ? array() : array('fungsi_id' => $fungsi_id);
        $is_shown = $can_see_all ? true : false;

        $pokitems = collect();
        $programs = Program::all()->sortBy('posisi');
        foreach ($programs as $program) {
            $program->jenis = 'program';
            $program->is_shown = $is_shown;
            $pokitems = $pokitems->push($program);
            $aktivitases = Aktivitas::where(['program_id' => $program->kode])->get()->sortBy('posisi');
            foreach ($aktivitases as $aktivitas) {
                $aktivitas->jenis = 'aktivitas';
                $aktivitas->is_shown = $is_shown;
                $pokitems = $pokitems->push($aktivitas);
                $kros = Kro::where(['aktivitas_id' => $aktivitas->kode])->get()->sortBy('posisi');
                foreach ($kros as $kro) {
                    $kro->jenis = 'kro';
                    $kro->is_shown = $is_shown;
                    $pokitems = $pokitems->push($kro);
                    $ros = Ro::where(['kro_id' => $kro->kode])->get()->sortBy('posisi');
                    foreach ($ros as $ro) {
                        $ro->jenis = 'ro';
                        $ro->is_shown = $is_shown;
                        $pokitems = $pokitems->push($ro);
                        $komponens = Komponen::where(['ro_id' => $ro->kode])->get()->sortBy('posisi');
                        foreach ($komponens as $komponen) {
                            $komponen->jenis = 'komponen';
                            $komponen->is_shown = $is_shown;
                            $pokitems = $pokitems->push($komponen);
                            $subkomponens = Subkomponen::where(['komponen_id' => $komponen->id])->get()->sortBy('posisi');
                            foreach ($subkomponens as $subkomponen) {
                                $subkomponen->jenis = 'subkomponen';
                                $subkomponen->is_shown = $is_shown;
                                $pokitems = $pokitems->push($subkomponen);
                                $filter_array['subkomponen_id'] = $subkomponen->id;
                                $detils = Detil::where($filter_array)->get()->sortBy('posisi');
                                if (count($detils) > 0 && !$can_see_all) {
                                    $program->is_shown = !$is_shown;
                                    $aktivitas->is_shown = !$is_shown;
                                    $kro->is_shown = !$is_shown;
                                    $ro->is_shown = !$is_shown;
                                    $komponen->is_shown = !$is_shown;
                                    $subkomponen->is_shown = !$is_shown;
                                }
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
        return view('rpd.rpd', compact('pokitems'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($type, $id)
    {
        if ($type == 'program') {
            $pokitem = Program::find($id);
            return view('pok.edit-program', compact('type', 'pokitem'));
        } else if ($type == 'aktivitas') {
            $pokitem = Aktivitas::find($id);
            return view('pok.edit-aktivitas', compact('type', 'pokitem'));
        } else if ($type == 'kro') {
            $pokitem = Kro::find($id);
            return view('pok.edit-kro', compact('type', 'pokitem'));
        } else if ($type == 'ro') {
            $pokitem = Ro::find($id);
            return view('pok.edit-ro', compact('type', 'pokitem'));
        } else if ($type == 'komponen') {
            $pokitem = Komponen::find($id);
            return view('pok.edit-komponen', compact('type', 'pokitem'));
        } else if ($type == 'subkomponen') {
            $pokitem = Subkomponen::find($id);
            return view('pok.edit-subkomponen', compact('type', 'pokitem'));
        } else if ($type == 'detil') {
            $pokitem = Detil::find($id);
            $departments = Fungsi::all();
            $detiltypes = JenisBelanja::all();
            return view('pok.edit-detil', compact('type', 'pokitem', 'departments', 'detiltypes'));
        } else {
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $type, $id)
    {
        $validationArray = array(
            'name' => 'required',
            'id' => 'required',
            'total' => 'required|numeric'
        );

        $validationAttribute = array(
            'name' => 'Deskripsi',
            'id' => 'Kode',
            'total' => 'Jumlah'
        );

        if ($request->create_type == 'detil') {
            $validationArray['department'] = 'required';
            $validationArray['detiltype'] = 'required';
            $validationArray['volume'] = 'required|numeric';
            $validationArray['unit'] = 'required';
            $validationArray['unit_price'] = 'required|numeric';

            $validationAttribute['department'] = 'Fungsi';
            $validationAttribute['detiltype'] = 'Jenis Belanja';
            $validationAttribute['volume'] = 'Volume';
            $validationAttribute['unit'] = 'Satuan';
            $validationAttribute['unit_price'] = 'Harga Satuan';
        }

        $validator = Validator::make($request->all(), $validationArray, [], $validationAttribute);

        $validator->validate();

        if ($request->create_type == 'program') {
            Program::find($id)->update([
                'kode' => $request->id,
                'deskripsi' => $request->name,
                'jumlah' => $request->total,
            ]);
            return redirect('/pok')->with('success-create', 'Program telah diubah!');
        } else if ($request->create_type == 'aktivitas') {
            Aktivitas::find($id)->update([
                'kode' => $request->id,
                'deskripsi' => $request->name,
                'jumlah' => $request->total,
            ]);
            return redirect('/pok')->with('success-create', 'Aktivitas telah diubah!');
        } else if ($request->create_type == 'kro') {
            Kro::find($id)->update([
                'kode' => $request->id,
                'deskripsi' => $request->name,
                'jumlah' => $request->total,
                'satuan' => $request->unit,
                'volume' => $request->volume,
            ]);
            return redirect('/pok')->with('success-create', 'KRO telah diubah!');
        } else if ($request->create_type == 'ro') {
            Ro::find($id)->update([
                'kode' => $request->id,
                'deskripsi' => $request->name,
                'jumlah' => $request->total,
            ]);
            return redirect('/pok')->with('success-create', 'RO telah diubah!');
        } else if ($request->create_type == 'komponen') {
            Komponen::find($id)->update([
                'kode' => $request->id,
                'deskripsi' => $request->name,
                'jumlah' => $request->total,
            ]);
            return redirect('/pok')->with('success-create', 'Komponen telah diubah!');
        } else if ($request->create_type == 'subkomponen') {
            Subkomponen::find($id)->update([
                'kode' => $request->id,
                'deskripsi' => $request->name,
                'jumlah' => $request->total,
            ]);
            return redirect('/pok')->with('success-create', 'Sub Komponen telah diubah!');
        } else if ($request->create_type == 'detil') {
            Detil::find($id)->update([
                'deskripsi' => $request->name,
                'jumlah' => $request->total,
                'satuan' => $request->unit,
                'volume' => $request->volume,
                'harga_satuan' => $request->unit_price,
                'fungsi_id' => $request->department,
                'jenis_belanja_id' => $request->detiltype,
            ]);
            return redirect('/pok')->with('success-create', 'Detil telah diubah!');
        } else {
            abort(404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($type, $id)
    {
        $typename = null;
        $pokitemname = null;
        try {
            if ($type == 'program') {
                $typename = "Program";
                $pokitemname = Program::find($id)->deskripsi;
                Program::find($id)->delete();
            } else if ($type == 'aktivitas') {
                $typename = "Aktivitas";
                $pokitemname = Aktivitas::find($id)->deskripsi;
                Aktivitas::find($id)->delete();
            } else if ($type == 'kro') {
                $typename = "KRO";
                $pokitemname = Kro::find($id)->deskripsi;
                Kro::find($id)->delete();
            } else if ($type == 'ro') {
                $typename = "RO";
                $pokitemname = Ro::find($id)->deskripsi;
                Ro::find($id)->delete();
            } else if ($type == 'komponen') {
                $typename = "Komponen";
                $pokitemname = Komponen::find($id)->deskripsi;
                Komponen::find($id)->delete();
            } else if ($type == 'subkomponen') {
                $typename = "Sub Komponen";
                $pokitemname = Subkomponen::find($id)->deskripsi;
                Subkomponen::find($id)->delete();
            } else if ($type == 'detil') {
                $typename = "Detil";
                $pokitemname = Detil::find($id)->deskripsi;
                Detil::find($id)->delete();
            } else {
                abort(404);
            }
            return redirect('/pok')->with('success-delete', $typename . ' ' . $pokitemname . ' telah dihapus!');
        } catch (Exception $e) {
            return redirect('/pok')->with('error-delete', $typename . ' ' . $pokitemname . ' gagal dihapus! Cek apakah item tersebut punya child atau tidak');
        }
    }

    public function showChangePosition($type, $id)
    {
        if ($type == 'program') {
            $pokitems = Aktivitas::where(['program_id' => $id])->get()->sortBy('posisi');
            $parent = Program::find($id);
            return view('pok.changepos-aktivitas', compact(['pokitems', 'type', 'id', 'parent']));
        } else if ($type == 'aktivitas') {
            $parent = Aktivitas::find($id);
            $pokitems = Kro::where(['aktivitas_id' => $id])->get()->sortBy('posisi');
            return view('pok.changepos-kro', compact(['pokitems', 'type', 'id', 'parent']));
        } else if ($type == 'kro') {
            $parent = Kro::find($id);
            $pokitems = Ro::where(['kro_id' => $id])->get()->sortBy('posisi');
            return view('pok.changepos-ro', compact(['pokitems', 'type', 'id', 'parent']));
        } else if ($type == 'ro') {
            $parent = Ro::find($id);
            $pokitems = Komponen::where(['ro_id' => $id])->get()->sortBy('posisi');
            return view('pok.changepos-komponen', compact(['pokitems', 'type', 'id', 'parent']));
        } else if ($type == 'komponen') {
            $parent = Komponen::find($id);
            $pokitems = Subkomponen::where(['komponen_id' => $id])->get()->sortBy('posisi');
            return view('pok.changepos-subkomponen', compact(['pokitems', 'type', 'id', 'parent']));
        } else if ($type == 'subkomponen') {
            $parent = Subkomponen::find($id);
            $pokitems = Detil::where(['subkomponen_id' => $id])->get()->sortBy('posisi');
            return view('pok.changepos-detil', compact(['pokitems', 'type', 'id', 'parent']));
        } else if ($type == 'root') {
            $pokitems = Program::all()->sortBy('posisi');
            return view('pok.changepos-program', compact(['pokitems', 'type', 'id']));
        } else {
            abort(404);
        }
    }

    public function updatePosition(Request $request, $type, $id)
    {
        $i = 0;
        foreach ($request->position as $childid) {
            if ($type == 'program') {
                Aktivitas::where('kode', $childid)->update(['posisi' => $i]);
            } else if ($type == 'aktivitas') {
                Kro::where('kode', $childid)->update(['posisi' => $i]);
            } else if ($type == 'kro') {
                Ro::where('kode', $childid)->update(['posisi' => $i]);
            } else if ($type == 'ro') {
                Komponen::where('kode', $childid)->update(['posisi' => $i]);
            } else if ($type == 'komponen') {
                Subkomponen::where('kode', $childid)->update(['posisi' => $i]);
            } else if ($type == 'subkomponen') {
                Detil::where('id', $childid)->update(['posisi' => $i]);
            } else if ($type == 'root') {
                Program::where('kode', $childid)->update(['posisi' => $i]);
            } else {
                abort(404);
            }
            $i++;
        }
        return redirect('/pok')->with('success-create', 'Urutan telah diubah!');
    }

    public function entriRpd($id, $column, $value){
        if ($value == 0) $value = null;
        $detil = Detil::find($id);
        return $detil->update([
            $column => $value,
        ]);
    }
}
