<?php

namespace App\Models\Master;

use App\Models\Kelas;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class TahunAjaran extends Model
{
    use SoftDeletes;
    use LogsActivity;

    protected $table = 'tahun_ajaran';
    protected $visible = ['id', 'tahun_ajaran', 'status'];
    protected $fillable = ['tahun_ajaran'];
    protected $dates = ['deleted_at'];

    public function kelas()
    {
        return $this->hasMany(Kelas::class, 'tahun_ajaran_id');
    }
}
