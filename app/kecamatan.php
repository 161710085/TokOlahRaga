<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kecamatan extends Model
{
    protected $table = 'kecamatans';
    protected $fillable = ['name'];
    public $timestamps = true;

    public function checkout()
    {
        return $this->hasMany('App\checkout','id_checkout');
    }
}
