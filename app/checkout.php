<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class checkout extends Model
{
    protected $table = 'checkouts';
    protected $fillable = ['id_user','nama','id_provinsi','id_kota','id_kecamatan',
'kodepos','alamat','email','phone','id_cart'];
    public $timestamps = true;
    public function user()
    {
        return $this->belongTo('App\user','id_user');
    }
    public function provinsi()
    {
        return $this->belongTo('App\provinsi','id_provinsi');
    }
    public function kota()
    {
        return $this->belongTo('App\kota','id_kota');
    }
    public function kecamatan()
    {
        return $this->belongTo('App\kecamatan','id_kecamatan');
    }
    public function cart()
    {
        return $this->belongTo('App\cart','id_cart');
    }
}
