<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProCatLink extends Model
{
    protected $table = 'procatlink';

    public function project(){
      return $this->belongsTo('App\Project');
   }

   public function category(){
      return $this->belongsTo('App\Category');
   }
}
