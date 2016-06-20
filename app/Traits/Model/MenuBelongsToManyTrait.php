<?php

namespace App\Traits\Model;

trait MenuBelongsToManyTrait
{
    public function menus()
    {
        return $this->belongsToMany('App\Models\Menu');
    }
}