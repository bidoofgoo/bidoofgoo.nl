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

   public static function getRelevant($projid = null, $amount = 7){
      $relevants = [];

      if ($projid != null) {
         $proj = Project::find($projid);
         foreach ($proj->links as $link) {
            foreach ($link->category->links as $link2) {
               array_push($relevants, $link2->project);
            }
         }
         $relevants = array_unique($relevants);
         shuffle($relevants);
         if (count($relevants) > $amount) {
            $relevants = array_slice($relevants, $amount);
         }
         $relevants = array_diff($relevants, array($proj));

         if(count($relevants) < $amount){
            while(count($relevants) < $amount){
               array_push($relevants, Project::all()->random(1)[0]);
               $relevants = array_unique($relevants);
            }
         }
      }else{
         $relevants = Project::inRandomOrder()->take($amount);
      }

      return $relevants;
   }

   public static function upclicks($id){
      $project = Project::find($id);

      $project->clicks = $project->clicks + 1;
      $project->save();
      echo "welll you tried to hack me but i hacked you back instead";
   }
}
