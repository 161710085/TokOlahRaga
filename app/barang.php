<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    protected $table = 'barangs';
    protected $fillable = array('nama', 'deskripsi','harga','stock','id_jenis','id_merk',
                                    'id_kategori','slug');
    public $timestamp = true;

    public function foto_barang() {
        return $this->hasMany('App\foto_barang', 'id_barang');
    }
    public function stock() {
        return $this->hasMany('App\stock', 'id_barang');
    }
    public function cart() {
        return $this->hasMany('App\cart', 'id_barang');
    }
    public function oreder_status() {
        return $this->hasMany('App\oreder_status', 'id_barang');
    }
    public function merk() {
        return $this->belongsTo('App\merk', 'id_merk');
    }
    public function kategori() {
        return $this->belongsTo('App\kategori', 'id_kategori');
    }
    public function jenis() {
        return $this->belongsTo('App\jenis', 'id_jenis');
    }
    public function checkout() {
        return $this->hasMany('App\checkout', 'id_barang');
    }
}
