<?php

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('check/nis', function (Request $request) {
    $nis = App\Models\Siswa::find($request->nis);
    if ($nis) {
        //axist
        return response()->json([
            'error' => false,
        ], 200);
    }

    return response()->json([
        'error' => true,
    ], 200);
});

Route::get('check/nisn', function (Request $request) {
    $nis = App\Models\Siswa::where([
        'nisn' => $request->nisn,
    ])->first();

    if ($nis) {
        //axist
        return response()->json([
            'error' => false,
        ], 200);
    }

    return response()->json([
        'error' => true,
    ], 200);
});

Route::get('pekerjaan/cari', function (Request $request) {
    $pekerjaan = App\Models\Siswa::where('nama', 'like', '%'.$request->search.'%')->limit(5)->get()->pluck('nama', 'nis');
    $arr = [];
    foreach ($pekerjaan as $keys => $value) {
        $row = [];
        $row['id'] = strtoupper($value);
        $row['text'] = strtoupper($value);
        $arr[] = $row;
    }

    return response()->json(['results'=>$arr], 200);
});

Route::get('grade', function (Request $request) {
    $grade = App\Models\Master\Grade::all(['id', 'grade']);

    return response()->json($grade, 200);
});

Route::get('kelas', function () {
    $kelas = App\Models\Kelas::select(['id', 'kelas']);

    return Datatables::of($kelas)->make(true);
});
