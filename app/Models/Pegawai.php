<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Traits\LogsActivity;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class Pegawai extends Authenticatable
{
    use Notifiable;
    use LogsActivity;
    use EntrustUserTrait;
//    protected $guard = 'pegawai';
    protected $table = 'pegawai';
    protected $primaryKey = 'nip';
    protected $visible = ['nip', 'nama'];
    public $incrementing = false;
    protected $hidden = ['password', 'remember_token'];

    protected $dates = ['deleted_at'];

    public function waliKelas()
    {
        return $this->hasMany(Kelas::class, 'nip_wali');
    }
}
