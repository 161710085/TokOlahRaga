<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class oreder_status extends Model
{
    protected $table ='oreder_status';
    protected $fillable = ['id_user','id_barang','id_bukti','status'];
     public $timestamps=true;
     public function user()
     {
         return $this->belongsTo('App\user','id_user');
     }
     public function barang()
     {
         return $this->belongsTo('App\baramg','id_barang');
     }
     public function checkout()
     {
         return $this->belongsTo('App\checkout','id_checkout');
     }
     public function oreder_status()
     {
         return $this->belongsTo('App\oreder_status','id_oreder_status');
     }
}

