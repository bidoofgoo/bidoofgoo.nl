<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Category;
use DB;

class ProjectsController extends Controller
{
   public static function getByDate($amount){
      return Project::latest()->get()->reverse()->take($amount);
   }

   public static function getByViews($amount){
      return Project::orderBy('clicks', 'desc')->orderBy('id', 'desc')->get()->take($amount);
   }

   public static function getTags(){
      return Category::all();
   }

   public static function getAllByDate(){
      return Project::all()->reverse();
   }

   public static function getAll(){
      return Project::all();
   }

   public static function upclicks($id){
      $project = Project::find($id);

      $project->clicks = $project->clicks + 1;
      $project->save();
      echo "welll you tried to hack me but i hacked you back instead";
   }
}
