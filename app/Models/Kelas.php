<?php

namespace App\Models;

use App\Models\Master\Grade;
use App\Models\Master\TahunAjaran;
use App\Models\Master\Tingkat;
use App\Models\scope\TahunAjaranAktif;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class Kelas extends Model
{
    use SoftDeletes;
    use LogsActivity;
    protected $table = 'kelas';
    protected $fillable = ['kelas', 'nip_wali'];

    protected $dates = ['deleted_at'];

    public function waliKelas()
    {
        return $this->belongsTo(Pegawai::class, 'nip_wali');
    }

    public function grade()
    {
        return $this->belongsTo(Grade::class, 'grade_id');
    }

    public function tahunAjaran()
    {
        return $this->belongsTo(TahunAjaran::class, 'tahun_ajaran_id');
    }

    public function mapels()
    {
        return $this->belongsToMany(MataPelajaran::class, 'kelas_mapel', 'kelas_id', 'mapel_id')
            ->withPivot('nip_mengajar');
    }

    public function tingkats()
    {
        return $this->belongsTo(Tingkat::class, 'tingkat');
    }

    public function siswas()
    {
        return $this->belongsToMany(Siswa::class, 'kelas_siswa', 'kelas_id', 'nis');
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($kelasa) {
            $kelasa->tahun_ajaran_id = TahunAjaran::where('status', 1)->first()['id'];
        });

        static::addGlobalScope(new TahunAjaranAktif());
    }
}
