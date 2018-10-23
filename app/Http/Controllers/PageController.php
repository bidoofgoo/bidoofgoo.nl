<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Projectpage;

class PageController extends Controller
{
    public function katCavia(){
      return view('katcavia');
   }

   public function makeProjectPage($slug){
      if(Projectpage::where('slug', $slug)->exists()){
         $page = Projectpage::where('slug', $slug)->first();
         if ($page->project != null) {
            $recommended = ProjectsController::getRelevant($page->project->id);
         }else{
            $recommended = ProjectsController::getRelevant();
         }
         return view('page', ['page' => $page, 'recommended' => $recommended]);
      }else{
         echo "page not found";
      }
   }
}
