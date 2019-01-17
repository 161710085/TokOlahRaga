<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class stok extends Model
{
    protected $table ='stoks';
    protected $fillable = ['jumlah','id_barang'];
     public $timestamps=true;
    public function barang()
    {
        return $this->belongsTo('App\barang','id_barang');
    }
}
