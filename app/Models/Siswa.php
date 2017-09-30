<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class Siswa extends Model
{
    use SoftDeletes;
//    use LogsActivity;

    protected $table = "siswa";
    protected $primaryKey = 'nis';
    public $incrementing = false;
    protected $hidden = ['password'];
    protected $guard = 'siswa';

    protected $dates = ['deleted_at'];

    public function orangTua()
    {
        return $this->hasMany(OrangTua::class, 'nis');
    }
    public function diterimaGrade()
    {
        return $this->belongsTo(Grade::class, 'diterima_grade');
    }
    public function kelas()
    {
        return $this->belongsToMany(Kelas::class, 'kelas_siswa', 'nis', 'kelas_id');
    }

}
