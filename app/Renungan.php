<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Renungan extends Model
{
    //
    protected $table = "renungan";
    protected $fillable = [
        'title', 'verse', 'content','image_url'
    ];
}