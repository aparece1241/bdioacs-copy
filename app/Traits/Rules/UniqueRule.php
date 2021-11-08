<?php

namespace App\Traits\Rules;

use Illuminate\Database\Eloquent\Model;

trait UniqueRule {

    public function getUniqueRule(Model $model = null)
    {
        return $model == null ? '': ','. $model->id;
    }
}
