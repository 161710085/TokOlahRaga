<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kota extends Model
{
    protected $table = 'kotas';
    protected $fillable = ['name'];
    public $timestamps = true;

    public function checkout()
    {
        return $this->hasMany('App\checkout','id_checkout');
    }
}
