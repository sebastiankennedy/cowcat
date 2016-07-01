<?php

namespace App\Models;

use App\Traits\Model\ActionBelongsToManyTrait;
use App\Traits\Model\MenuBelongsToManyTrait;
use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission
{
    use MenuBelongsToManyTrait, ActionBelongsToManyTrait;
    /**
     * 限制读取字段.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * 设置模型表名.
     *
     * @var string
     */
    protected $table = 'permissions';
}
