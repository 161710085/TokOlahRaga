<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class provinsi extends Model
{
    protected $table = 'provinsis';
    protected $fillable = ['name'];
    public $timestamps = true;

    public function checkout()
    {
        return $this->hasMany('App\checkout','id_checkout');
    }
}
