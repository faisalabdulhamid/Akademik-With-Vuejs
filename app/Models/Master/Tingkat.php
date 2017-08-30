<?php

namespace App\Models\Master;

use App\Models\MataPelajaran;
use Illuminate\Database\Eloquent\Model;

class Tingkat extends Model
{
    protected $table = 'tingkat';
    public $timestamps = false;

    public function mapels()
    {
        return $this->hasMany(MataPelajaran::class, 'tingkat');
    }
}
