<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    /**
     * [$guarded description]
     *
     * @var string
     */
    protected static $order = 'sort';

    /**
     * [$guarded description]
     *
     * @var array
     */
    protected static $index = [
        'id',
        'name',
        'route',
        'icon',
        'parent_id',
    ];

    /**
     * [$guarded description]
     *
     * @var string
     */
    protected static $sort = 'desc';

    /**
     * [$guarded description]
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * [$guarded description]
     *
     * @var string
     */
    protected $table = "menus";
}
