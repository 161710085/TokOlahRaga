<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class checkout extends Model
{
   //
   protected $table = 'checkouts';
   protected $fillable = array('id_user', 'nama_lengkap','nomer_telepon','email','provinsi','kab_kot','kecamatan','alamat','id_barang');
   public $timestamp = true;

   public function oreder_status() {
       return $this->hasMany('App\oreder_status', 'id_checkout');
   }
   public function User() {
       return $this->belongsTo('App\User', 'id_user');
   }
   public function barang() {
       return $this->belongsTo('App\barang', 'id_barang');
   }
}
