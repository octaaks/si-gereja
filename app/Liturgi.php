<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Liturgi extends Model
{
    protected $table = "liturgi";
    protected $fillable = [
        'title',
        'filename'
    ];
}
