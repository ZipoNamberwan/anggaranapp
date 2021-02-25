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
        $programs = Program::all();
        return view('pok.index', compact('programs'));
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

            $validationAttribute['department'] = 'Fungsi';
            $validationAttribute['detiltype'] = 'Jenis Belanja';
            $validationAttribute['volume'] = 'Volume';
            $validationAttribute['unit'] = 'Satuan';
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
                'posisi' => $pos
            ]);
            return redirect('/pok')->with('success-create', 'Sub Komponen telah ditambah!');
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

            $validationAttribute['department'] = 'Fungsi';
            $validationAttribute['detiltype'] = 'Jenis Belanja';
            $validationAttribute['volume'] = 'Volume';
            $validationAttribute['unit'] = 'Satuan';
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
                'fungsi_id' => $request->department,
                'jenis_belanja_id' => $request->detiltype,
            ]);
            return redirect('/pok')->with('success-create', 'Sub Komponen telah diubah!');
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
}
