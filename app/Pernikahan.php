<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pernikahan extends Model
{
    protected $table = "pernikahan";
    protected $fillable = [
        'name1','name2', 'date'
    ];
}