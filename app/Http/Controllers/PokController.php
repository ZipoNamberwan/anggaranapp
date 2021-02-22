<?php

namespace App\Http\Controllers;

use App\Models\Aktivitas;
use App\Models\Komponen;
use App\Models\Kro;
use App\Models\Program;
use App\Models\Ro;
use App\Models\Subkomponen;
use Illuminate\Http\Request;

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
        $title = '';
        $parent = null;
        if ($type == 'program') {
            $title = 'Tambah Aktivitas';
            $parent = Program::find($id);
        } else if ($type == 'aktivitas') {
            $title = 'Tambah KRO';
            $parent = Aktivitas::find($id);
        } else if ($type == 'kro') {
            $title = 'Tambah RO';
            $parent = Kro::find($id);
        } else if ($type == 'ro') {
            $title = 'Tambah Komponen';
            $parent = Ro::find($id);
        } else if ($type == 'komponen') {
            $title = 'Tambah Sub Komponen';
            $parent = Komponen::find($id);
        } else if ($type == 'subkomponen') {
            $title = 'Tambah Detil';
            $parent = Subkomponen::find($id);
        } else {
            abort(404);
        }
        return view('pok.create', compact('title', 'type', 'parent'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        return $type . ' ' . $id;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
