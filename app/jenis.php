<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jenis extends Model
{
    protected $table = 'jenis';
    protected $fillable = array('nama_olahraga','slug');
    public $timestamp = true;

    public function barang() {
        return $this->hasMany('App\barang', 'id_jenis');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
