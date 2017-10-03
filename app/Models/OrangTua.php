<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrangTua extends Model
{
    protected $table = "orang_tua";
//    protected $visible = ['password', 'created_at', 'updated_at', ''];
    protected $visible = ['ayah','pendidikan_ayah','pekerjaan_ayah','telepon_ayah','ibu','pendidikan_ibu','pekerjaan_ibu','telepon_ibu','alamat','wali','pendidikan_wali','pekerjaan_wali','telepon_wali','alamat_wali'];
//    protected $guard = 'ortu';

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'nis');
    }

    public static function init()
    {
        return [
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
            'alamat_wali' => ''
        ];
    }
}
