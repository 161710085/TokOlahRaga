<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    protected $table = 'kategoris';
    protected $fillable = array('nama_kategori','slug');
    public $timestamp = true;

    public function Barang() {
        return $this->hasMany('App\barang', 'id_kategori');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
