<?php

namespace App\Http\Controllers;

use App\Models\OrangTua;
use App\Models\Siswa;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class SiswaController extends Controller
{
    protected $siswa;

    public function __construct(Siswa $siswa){
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
        if(request()->ajax()){
            if(request()->kelas == 'all'){
                return Datatables::of($this->siswa->select(['nis', 'nama', 'jenis_kelamin']))->make(true);
            }else{
                $kelas = request()->kelas;
                $siswa = $this->siswa->select(['nis', 'nama', 'jenis_kelamin'])
                    ->whereHas('kelas', function($q) use($kelas){
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
        $prestasi = [
            ''
        ];
        return fractal($this->siswa, function(Siswa $siswa){
            return [
                'nis' => '',
                'nisn' => '',
                'nama' => '',
                'jenis_kelamin' => '',
                'tempat_lahir' => '',
                'tanggal_lahir' => '',
                'agama' => '',
                'anak_ke' => '',
                'status_keluarga' => 'Anak Kandung',
                'alamat' => '',
                'diterima_grade' => '',
                'diterima_tanggal' => '',
                'asal_sekolah' => '',
                'tahun_ijazah' => '',
                'nomor_ijazah' => '',
                'foto' => '',
                'status_belajar' => '',
                'telepon' => '',
                'email' => '',

                'ayah' => '',
                'telepon_ayah'=> '',
                'pendidikan_ayah' => '',
                'pekerjaan_ayah' => '',
                'ibu' => '',
                'telepon_ibu' => '',
                'pendidikan_ibu' => '',
                'pekerjaan_ibu' => '',
                'alamat_orang_tua' => '',
                'telepon_wali' => '',
                'wali' => '',
                'pendidikan_wali' => '',
                'pekerjaan_wali' => '',
                'alamat_wali' => '',

                'prestasi' => '',
                'beasiswa' => ''
            ];
        });
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nis' => 'required',
            'nisn' => 'required',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'agama' => '',
            'anak_ke' => '',
            'status_keluarga' => '',
            'alamat' => '',
            'diterima_grade' => '',
            'diterima_tanggal' => '',
            'asal_sekolah' => '',
            'tahun_ijazah' => '',
            'nomor_ijazah' => '',
            'foto' => '',
            'telepon' => '',
            'email' => '',

            'ayah' => '',
            'pendidikan_ayah' => '',
            'pekerjaan_ayah' => '',
            'telepon_ayah' => '',
            'ibu' => '',
            'pendidikan_ibu' => '',
            'pekerjaan_ibu' => '',
            'telepon_ibu' => '',
            'alamat' => '',
            'wali' => '',
            'pendidikan_wali' => '',
            'pekerjaan_wali' => '',
            'telepon_wali' => '',
            'alamat_wali' => '',
        ]);
        $siswa = new Siswa();
        $siswa->nis = $request->nis;
        $siswa->nisn = $request->nisn;
        $siswa->nama = $request->nama;
        $siswa->jenis_kelamin = $request->jenis_kelamin;
        $siswa->tempat_lahir = $request->tempat_lahir;
        $siswa->tanggal_lahir = Carbon::parse($request->tanggal_lahir)->format('Y-m-d');
        $siswa->agama = $request->agama;
        $siswa->anak_ke = $request->anak_ke;
        $siswa->status_keluarga = $request->status_keluarga;
        $siswa->alamat = $request->alamat;
        $siswa->diterima_grade = $request->diterima_grade;
        $siswa->diterima_tanggal = Carbon::parse($request->diterima_tanggal)->format('Y-m-d');
        $siswa->asal_sekolah = $request->asal_sekolah;
        $siswa->tahun_ijazah = $request->tahun_ijazah;
        $siswa->nomor_ijazah = $request->nomor_ijazah;
        $siswa->telepon = $request->telepon;
        $siswa->email = $request->email;
//        $siswa->foto = $request->foto;
        $siswa->prestasi = $request->prestasi;
        $siswa->beasiswa = $request->beasiswa;
        $siswa->save();

        $ortu = new OrangTua();
        $ortu->ayah = $request->ayah;
        $ortu->pendidikan_ayah = $request->pendidikan_ayah;
        $ortu->pekerjaan_ayah = $request->pekerjaan_ayah;
        $ortu->telepon_ayah = $request->telepon_ayah;
        $ortu->ibu = $request->ibu;
        $ortu->pendidikan_ibu = $request->pendidikan_ibu;
        $ortu->pekerjaan_ibu = $request->pekerjaan_ibu;
        $ortu->telepon_ibu = $request->telepon_ibu;
        $ortu->alamat = $request->alamat;
        $ortu->wali = $request->wali;
        $ortu->pendidikan_wali = $request->pendidikan_wali;
        $ortu->pekerjaan_wali = $request->pekerjaan_wali;
        $ortu->telepon_wali = $request->telepon_wali;
        $ortu->alamat_wali = $request->alamat_wali;
        $ortu->nis = $siswa->nis;
        $ortu->save();
        
        return response()->json([
            'info' => true,
            'message' => 'Data Berhasil Ditambahkan'
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        return fractal($this->siswa->find($id), function(Siswa $siswa){
            return [
                'nis' => $siswa->nis,
                'nisn' => $siswa->nisn,
                'nama' => $siswa->nama,
                'jenis_kelamin' => $siswa->jenis_kelamin,
                'tempat_lahir' => $siswa->tempat_lahir,
                'tanggal_lahir' => Carbon::parse($siswa->tanggal_lahir)->format('d-m-Y'),
                'agama' => $siswa->agama,
                'anak_ke' => $siswa->anak_ke,
                'status_keluarga' => $siswa->status_keluarga,
                'alamat' => $siswa->alamat,
                'diterima_grade' => $siswa->diterima_grade,
                'diterima_tanggal' => Carbon::parse($siswa->diterima_tanggal)->format('d-m-Y'),
                'asal_sekolah' => $siswa->asal_sekolah,
                'tahun_ijazah' => $siswa->tahun_ijazah,
                'nomor_ijazah' => $siswa->nomor_ijazah,
                'foto' => $siswa->foto,
                'status_belajar' => $siswa->status_belajar,
                'telepon' => $siswa->telepon,
                'email' => $siswa->email,
                'prestasi' => $siswa->prestasi,
                'beasiswa' => $siswa->beasiswa,

                'ayah' => $siswa->orangTua->first()->ayah,
                'telepon_ayah'=> $siswa->orangTua->first()->telepon_ayah,
                'pendidikan_ayah' => $siswa->orangTua->first()->pendidikan_ayah,
                'pekerjaan_ayah' => $siswa->orangTua->first()->pekerjaan_ayah,
                'ibu' => $siswa->orangTua->first()->ibu,
                'telepon_ibu' => $siswa->orangTua->first()->telepon_ibu,
                'pendidikan_ibu' => $siswa->orangTua->first()->pendidikan_ibu,
                'pekerjaan_ibu' => $siswa->orangTua->first()->pekerjaan_ibu,
                'alamat_orang_tua' => $siswa->orangTua->first()->alamat_orang_tua,
                'telepon_wali' => $siswa->orangTua->first()->telepon_wali,
                'wali' => $siswa->orangTua->first()->wali,
                'pendidikan_wali' => $siswa->orangTua->first()->pendidikan_wali,
                'pekerjaan_wali' => $siswa->orangTua->first()->pekerjaan_wali,
                'alamat_wali' => $siswa->orangTua->first()->alamat_wali,
            ];
        });

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return fractal($this->siswa->find($id), function(Siswa $siswa){
            return [
                'nis' => $siswa->nis,
                'nisn' => $siswa->nisn,
                'nama' => $siswa->nama,
                'jenis_kelamin' => $siswa->jenis_kelamin,
                'tempat_lahir' => $siswa->tempat_lahir,
                'tanggal_lahir' => Carbon::parse($siswa->tanggal_lahir)->format('d-m-Y'),
                'agama' => $siswa->agama,
                'anak_ke' => $siswa->anak_ke,
                'status_keluarga' => $siswa->status_keluarga,
                'alamat' => $siswa->alamat,
                'diterima_grade' => $siswa->diterima_grade,
                'diterima_tanggal' => Carbon::parse($siswa->diterima_tanggal)->format('d-m-Y'),
                'asal_sekolah' => $siswa->asal_sekolah,
                'tahun_ijazah' => $siswa->tahun_ijazah,
                'nomor_ijazah' => $siswa->nomor_ijazah,
                'foto' => $siswa->foto,
                'status_belajar' => $siswa->status_belajar,
                'telepon' => $siswa->telepon,
                'email' => $siswa->email,
                'prestasi' => $siswa->prestasi,
                'beasiswa' => $siswa->beasiswa,

                'ayah' => $siswa->orangTua->first()->ayah,
                'telepon_ayah'=> $siswa->orangTua->first()->telepon_ayah,
                'pendidikan_ayah' => $siswa->orangTua->first()->pendidikan_ayah,
                'pekerjaan_ayah' => $siswa->orangTua->first()->pekerjaan_ayah,
                'ibu' => $siswa->orangTua->first()->ibu,
                'telepon_ibu' => $siswa->orangTua->first()->telepon_ibu,
                'pendidikan_ibu' => $siswa->orangTua->first()->pendidikan_ibu,
                'pekerjaan_ibu' => $siswa->orangTua->first()->pekerjaan_ibu,
                'alamat_orang_tua' => $siswa->orangTua->first()->alamat_orang_tua,
                'telepon_wali' => $siswa->orangTua->first()->telepon_wali,
                'wali' => $siswa->orangTua->first()->wali,
                'pendidikan_wali' => $siswa->orangTua->first()->pendidikan_wali,
                'pekerjaan_wali' => $siswa->orangTua->first()->pekerjaan_wali,
                'alamat_wali' => $siswa->orangTua->first()->alamat_wali,
            ];
        });
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
