<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class berita extends Model
{
    protected $table ='beritas';
       protected $fillable =array('foto','judul','artikel');
     public $timestamps=true;
 
   public function getRouteKeyName()
    {
return 'slug';
    } 
}
