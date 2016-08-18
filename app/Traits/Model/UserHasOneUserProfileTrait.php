<?php

namespace App\Traits\Model;

trait UserHasOneUserProfileTrait
{
    public function profile()
    {
        return $this->hasOne('App\Models\UserProfile');
    }
}