<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    protected $table ='barangs';
    protected $fillable = ['nama','id_kategori','id_merk','id_jenis','deskripsi','size','harga','stok','slug'];
     public $timestamps=true;
    public function kategori()
    {
        return $this->belongsTo('App\kategori','id_kategori');
    }
    
    public function merk()
    {
        return $this->belongsTo('App\merk','id_merk');
    }
     public function jenis()
    {
        return $this->belongsTo('App\jenis','id_jenis');
    }
    public function foto_barang()
    {
        return $this->hasMany('App\foto_barang','id_barang');
    }
    public function cart()
    {
        return $this->hasMany('App\cart','id_cart');
    }
    public function oreder_status()
    {
        return $this->hasMany('App\oreder_status','id_oreder_status');
    }
    public function getRouteKeyName()
    {
return 'slug';
    }
}
