<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'SiswaController@index');

Route::resource('siswa', 'SiswaController');
Route::resource('kelas', 'KelasController');
//Route::resource('pegawai', 'PegawaiController');

Route::namespace('Master')->group(function(){
    Route::resource('tahun-ajaran', 'TahunAjaranController');
    Route::resource('grade', 'GradeController');
    Route::resource('tingkat', 'TingkatController');
});


//Validate
Route::get('siswa/validate/nis/{nis}', function($nis){
    $exists = App\Models\Siswa::find($nis);
    if($exists)
        return false;
    else
        return true;
});

//Pilih Wali Kelas {Kelas}
Route::get('wali-kelas', function(){
    if(request()->ajax()){
        return fractal(App\Models\Pegawai::all(), function(App\Models\Pegawai $waliKelas){
            return [
                'nip' => $waliKelas->nip,
                'nama' => $waliKelas->nama
            ];
        })->toJson();
    }
});
