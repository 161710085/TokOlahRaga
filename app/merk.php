<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class merk extends Model
{
    protected $table = 'merks';
    protected $fillable = array('nama_merk','slug');
    public $timestamp = true;

    public function Barang() {
        return $this->hasMany('App\barang', 'id_merk');
    }
    
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
