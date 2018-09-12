<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'projects';

    public function links(){
      return $this->hasMany('App\ProCatLink');
   }

   public function page(){
      return $this->hasOne('App\Projectpage');
   }
}
