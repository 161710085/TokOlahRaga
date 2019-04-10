<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class foto_barang extends Model
{
    protected $table = 'foto_barangs';
    protected $fillable = array('foto','id_barang');
    public $timestamp = true;
    
    public function barang() {
        return $this->belongsTo('App\barang', 'id_barang');
    }
}