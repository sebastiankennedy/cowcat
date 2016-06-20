<?php
namespace App\Models;

use Zizaco\Entrust\EntrustPermission;
use App\Traits\Model\MenuBelongsToManyTrait;
use App\Traits\Model\ActionBelongsToManyTrait;

class Permission extends EntrustPermission
{
    use MenuBelongsToManyTrait, ActionBelongsToManyTrait;
    /**
     * 限制读取字段
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * 设置模型表名
     *
     * @var string
     */
    protected $table = "permissions";
}