<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projectpage extends Model
{
    public $table = 'projectpages';
    

    public $fillable = ['slug', 'project_id', 'title', 'content'];

    public function project(){
      return $this->belongsTo('App\Project');
   }
}
