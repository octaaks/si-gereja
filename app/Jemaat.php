<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jemaat extends Model
{
    protected $table = "jemaat";
    protected $fillable = [
        'no_kk','nik','head_of_family','name','lingkungan_id', 'birthplace','date_of_birth','lingkungan_id'
    ];

    public function lingkungan()
    {
        return $this->belongsTo('App\Lingkungan', 'lingkungan_id');
    }
}