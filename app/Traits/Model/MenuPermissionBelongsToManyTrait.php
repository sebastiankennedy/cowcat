<?php

namespace App\Traits\Model;

trait MenuPermissionBelongsToManyTrait
{
    public function menus()
    {
        return $this->belongsToMany('App\Models\Menu');
    }

    public function permissions()
    {
        return $this->belongsToMany('App\Models\Permission');
    }
}