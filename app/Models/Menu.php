<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $guarded = [];
    protected $table = "menus";
    protected static $order = 'created_at';
    protected static $sort = 'desc';
    protected static $index = ['id','name','route','icon','parent_id'];
}
