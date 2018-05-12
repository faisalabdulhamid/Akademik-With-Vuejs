<?php

namespace App\Models;

use App\Models\Master\Tingkat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class MataPelajaran extends Model
{
    use SoftDeletes;
    use LogsActivity;
    protected $table = 'mata_pelajaran';

    protected $dates = ['deleted_at'];

    public function kelas()
    {
        return $this->belongsToMany(Kelas::class, 'kelas_mapel', 'mapel_id', 'kelas_id')
            ->withPivot('nip_mengajar');
    }

    public function tingkats()
    {
        return $this->belongsTo(Tingkat::class, 'tingkat');
    }
}
