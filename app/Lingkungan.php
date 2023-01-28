<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lingkungan extends Model
{
    protected $table = "lingkungan";
    protected $fillable = [
        'nama_lingkungan'
    ];
    
    public function jemaat()
    {
        return $this->hasMany('App\Jemaat');
    }
}