<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class foto_barang extends Model
{
    protected $table ='foto_barangs';
    protected $fillable = ['foto','id_barang'];
     public $timestamps=true;
    public function barang()
    {
        return $this->belongsTo('App\barang','id_barang');
    }
}
