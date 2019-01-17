<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    protected $table = 'kategoris';
    protected $fillable = ['nama'];
    public $timestamps = true;

    public function barang()
    {
        return $this->hasMany('App\barang','id_kategori');
    }
    
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
