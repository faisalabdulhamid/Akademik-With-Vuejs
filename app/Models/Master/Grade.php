<?php

namespace App\Models\Master;

use App\Models\Kelas;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $table = 'grade';
    public $timestamps = false;

    public function kelas()
    {
        return $this->hasMany(Kelas::class, 'grade_id');
    }
}
