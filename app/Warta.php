<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Warta extends Model
{
    protected $table = "warta";
    protected $fillable = [
        'title',
        'filename'
    ];
}
