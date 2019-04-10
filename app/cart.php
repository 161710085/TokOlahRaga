<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    protected $table = 'carts';
    protected $fillable = ['id_user','id_barang','jumlah',];
    public $timestamps = true;
    public function user()
    {
        return $this->belongsTo('App\user','id_user');
    }
    public function barang()
    {
        return $this->belongsTo('App\barang','id_barang');
    }
    public function checkout()
    {
        return $this->hasOne('App\checkout','id_checkout');
    }
}
