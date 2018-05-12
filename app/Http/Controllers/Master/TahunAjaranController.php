<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Master\TahunAjaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Facades\Datatables;

class TahunAjaranController extends Controller
{
    protected $tahun;

    public function __construct(TahunAjaran $tahunAjaran)
    {
        $this->tahun = $tahunAjaran;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            return Datatables::of($this->tahun->query())->make(true);
        }

        return view('tahun-ajaran.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return fractal($this->tahun, function (TahunAjaran $tahun) {
            return [
                'id'           => $tahun->id,
                'tahun_ajaran' => $tahun->tahun_ajaran,
            ];
        });
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
            'tahun_ajaran' => 'required',
        ]);

        TahunAjaran::firstOrCreate(['tahun_ajaran'=>$request->tahun_ajaran]);

        return response()->json([
            'saved' => true,
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
        $tahun = TahunAjaran::find($id);

        return fractal($tahun, function (TahunAjaran $tahun) {
            return [
                'id'           => $tahun->id,
                'tahun_ajaran' => $tahun->tahun_ajaran,
                'status'       => $tahun->status,
            ];
        });
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
        //
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
        DB::transaction(function () use ($id) {
            DB::table('tahun_ajaran')->update(['status' => null]);

            $tahun = TahunAjaran::findOrFail($id);
            $tahun->status = 1;
            $tahun->save();
        });

        return response()->json([
            'saved'   => true,
            'message' => '',
        ]);
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
