<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'projectcategories';

    public function links(){
      return $this->hasMany('App\ProCatLink');
   }

   public function projects(){
      return $this->hasManyThrough('App\Product', 'App\ProCatLink');
   }
}
