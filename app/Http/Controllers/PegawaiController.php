<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    protected $pegawai;

    public function __construct(Pegawai $pegawai)
    {
        $this->$pegawai = $pegawai;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            return fractal(Pegawai::all(), function (Pegawai $pegawai) {
                return [
                    'nip'  => $pegawai->nip,
                    'nama' => $pegawai->nama,
                ];
            })->toJson();
        }
//        return fractal($this->pegawai->all(), function(Pegawai $pegawai){
//            return [
//                'nip' => $pegawai->nip,
//                'nama' => $pegawai->nama,
//            ];
//        })->toJson();
        dd(Pegawai::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Pegawai $pegawai
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Pegawai $pegawai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Pegawai $pegawai
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Pegawai $pegawai)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Pegawai      $pegawai
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pegawai $pegawai)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Pegawai $pegawai
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pegawai $pegawai)
    {
        //
    }
}
