<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class SiswaController extends Controller
{
    protected $siswa;

    public function __construct(Siswa $siswa)
    {
        $this->middleware(['auth']);

        $this->siswa = $siswa;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            if (request()->kelas == 'all') {
                return Datatables::of($this->siswa->select(['nis', 'nama', 'jenis_kelamin']))->make(true);
            } else {
                $kelas = request()->kelas;
                $siswa = $this->siswa->select(['nis', 'nama', 'jenis_kelamin'])
                    ->whereHas('kelas', function ($q) use ($kelas) {
                        $q->where('id', $kelas);
                    });

                return Datatables::of($siswa)->make(true);
            }
        }

        return view('siswa.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return fractal($this->siswa, function (Siswa $siswa) {
            return [
                'nis'              => ' ',
                'nisn'             => ' ',
                'nama'             => '',
                'jenis_kelamin'    => '',
                'tempat_lahir'     => '',
                'tanggal_lahir'    => '',
                'agama'            => '',
                'anak_ke'          => '',
                'status_keluarga'  => '',
                'alamat'           => '',
                'diterima_grade'   => '',
                'diterima_tanggal' => '',
                'asal_sekolah'     => '',
                'tahun_ijazah'     => '',
                'nomor_ijazah'     => '',
                'foto'             => '',
                'status_belajar'   => '',
                'telepon'          => '',
                'email'            => '',
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
        //
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
        return fractal($this->siswa->find($id), function (Siswa $siswa) {
            return [
                'nis'  => $siswa->nis,
                'nama' => $siswa->nama,
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
