<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrangTua extends Model
{
    protected $table = "orang_tua";
//    protected $hidden = ['password'];
//    protected $guard = 'ortu';

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'nis');
    }
}
