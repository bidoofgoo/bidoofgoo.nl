<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use App\Project;
use App\Category;
use App\ProCatLink;
use Carbon\Carbon;
use DB;

class ProjectsController extends Controller
{
   public static function getByDate($amount){
      return Project::where('active', True)->orderBy('release_date', 'desc')->get()->reverse()->take($amount);
   }

   public static function getRecent($amount){
      return Project::where('active', True)->orderBy('release_date', 'asc')->get()->reverse()->take($amount);
   }

   public static function getByViews($amount){
      return Project::where('active', True)->orderBy('clicks', 'desc')->orderBy('release_date', 'desc')->get()->take($amount);
   }

   public static function getAllByDate(){
      return Project::where('active', True)->orderBy('release_date', 'desc')->get();
   }

   public static function getAll(){
      return Project::orderBy('release_date', 'desc')->get();
   }

   public static function getAllWithTag($tag){
      $toReturn = [];
      foreach (ProjectsController::getAllByDate() as $project) {
         if ($project->active) {
            foreach ($project->links as $link) {
               if ($link->category == $tag) {
                  array_push($toReturn, $project);
               }
            }
         }
      }

      return $toReturn;
   }

   public static function getRelevant($projid = null, $amount = 7){
      $relevants = [];

      if ($projid != null) {
         $proj = Project::find($projid);
         foreach ($proj->links as $link) {
            foreach ($link->category->links as $link2) {
               if ($link2->project->id != $projid) {
                  array_push($relevants, $link2->project);
               }
            }
         }
         $relevants = array_unique($relevants);
         shuffle($relevants);
         if (count($relevants) > $amount) {
            $relevants = array_slice($relevants, $amount);
         }
         $relevants = array_diff($relevants, array($proj));

         foreach ($relevants as $key => $project) {
            if(!$project->active){
               unset($relevants[$key]);
            }
         }

         if(count($relevants) < $amount){
            $maxtries = 50;
            while(count($relevants) < $amount && $maxtries > 0){
               $randitem = Project::where('active', True)->get()->random(1)[0];
               if ($randitem->id != $projid) {
                  array_push($relevants, $randitem);
                  $relevants = array_unique($relevants);
               }
               $maxtries = $maxtries - 1;
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

      echo "<script> setTimeout(function(){window.location.href = '" . url('deleteThisHacker') . "';}, 1000);</script>";
   }

   public static function createProjectPage($editing = null){
      if ($editing == null) {
         $title = 'Placeholder Title';
         $image='placeholder.png';
         $date = Carbon::now()->toDateString();
         $alturl = 'https://bidoofgoo.nl/';
         $id = 0;
         $activeTags = [];
         $create = True;
      } else{
         $proj = Project::find($editing);
         $title = $proj->name;
         $image = $proj->image;
         $date = $proj->release_date;
         $alturl = $proj->url;
         $id = $proj->id;
         $activeTags = $proj->links;
         $create = False;
      }
      return view('admin.create_project', ['id' => $id, 'title'=>$title, 'image'=>$image, 'date' => $date, 'alturl' => $alturl, 'create'=>$create, 'tags' =>CategoryController::getTags(), 'activeTags' => $activeTags]);
   }

   public function createProject(Request $req){
      if ($req->id == 0) {
         $proj = new Project;
      }else{
         $proj = Project::find($req->id);
         foreach ($proj->links as $link) {
            $link->delete();
         }
      }

      $proj->name = $req->title;
      $proj->image = $req->image;
      $proj->url = $req->alturl;
      $proj->release_date = $req->date;

      $proj->save();

      foreach ($req->tags as $tag) {
         $link = new ProCatLink;
         $link->project_id = $proj->id;
         $link->category_id = $tag;
         $link->save();
      }

      return redirect(url('/admin/projects'));
   }

   public function deleteProject($id){
      Project::find($id)->delete();
      return redirect()->back();
   }

   public function activateProject($projid){
      $project = Project::find($projid);
      $project->active = !$project->active;
      $project->save();
      return redirect()->back();
   }

   public function activateAllProjects(){
      foreach (Project::all() as $project) {
         $project->active = True;
         $project->save();
      }
      return redirect()->back();
   }
}
