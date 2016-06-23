<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActionPermission extends Model
{
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
    protected $table = "action_permission";
}
