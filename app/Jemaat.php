<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jemaat extends Model
{
    protected $table = "jemaat";
    protected $fillable = [
        'no_kk','nik','head_of_family','name', 'date_of_birth'
    ];
}
