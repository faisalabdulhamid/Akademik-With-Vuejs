<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class KelasController extends Controller
{
    protected $kelas;

    public function __construct(Kelas $kelas)
    {
        $this->kelas = $kelas;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $kelas = fractal($this->kelas->all(), function (Kelas $kelas) {
                return [
                    'id'         => $kelas->id,
                    'kelas'      => $kelas->kelas,
                    'wali_kelas' => ($kelas->waliKelas) ? $kelas->waliKelas->nama : '',
                ];
            })->toArray()['data'];

            return Datatables::of($kelas)->make(true);
        }

        return view('kelas.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (request()->ajax()) {
            $create['KelasSchema'] = [
                'fields' => [
                    [
                        'type'      => 'input',
                        'inputType' => 'text',
                        'label'     => 'Kelas',
                        'model'     => 'kelas',
                        'required'  => true,
                        'validator' => ['string'],
                    ],
                    [
                        'type'     => 'select',
                        'label'    => 'Wali Kelas',
                        'model'    => 'wali_kelas',
                        'required' => true,
                        'values'   => [],
                    ],
                ],
            ];
            $create['SiswaSchema'] = '';
            $create['MapelSchema'] = '';

            return response()->json($create, 200);
        }
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
        $this->validate($request, [
            'kelas'      => 'required',
            'wali_kelas' => 'required',
        ]);

        $this->kelas->firstOrCreate([
            'kelas'    => $request->kelas,
            'nip_wali' => $request->wali_kelas,
        ]);

        return response()->json([
            'saved'   => true,
            'message' => 'Kelas Berhasil Disimpan',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->kelas->find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
