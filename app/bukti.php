<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bukti extends Model
{
    protected $table ='buktis';
    protected $fillable = ['nama_rek','nama_bang','foto'];
     public $timestamps=true;
     public function oreder_status()
     {
         return $this->hasMany('App\oreder_status','id_oreder_status');
     }
}
