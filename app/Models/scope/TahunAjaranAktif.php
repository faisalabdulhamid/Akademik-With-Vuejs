<?php
/**
 * Created by PhpStorm.
 * User: FAISAL ABDUL HAMID
 * Date: 30/08/2017
 * Time: 11:57.
 */

namespace App\Models\scope;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class TahunAjaranAktif implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param \Illuminate\Database\Eloquent\Builder $builder
     * @param \Illuminate\Database\Eloquent\Model   $model
     *
     * @return void
     */
    public function apply(Builder $builder, Model $model)
    {
        // TODO: Implement apply() method.
        $builder->whereHas('tahunAjaran', function ($query) {
            $query->where('status', 1);
        });
    }
}
