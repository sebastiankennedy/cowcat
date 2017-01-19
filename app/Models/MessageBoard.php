<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MessageBoard extends Model
{
    protected $table = "message_board";

    protected $fillable = ['name', 'email', 'message'];

    public $timestamps = false;
}
