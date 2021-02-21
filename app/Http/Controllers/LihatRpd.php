<?php

namespace App\Http\Controllers;

use App\Models\Detil;


class LihatRpd extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $detils = Detil::all();
        return view('rpdlihat', compact('detils')); 
    }
}
