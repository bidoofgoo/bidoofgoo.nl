<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Projectpage;
use Storage;

class PageController extends Controller
{
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

   public function createPagePage(){
      $content = '<article><h2></h2><div class="artcontent"><div class="contentimg"></div></div></article>';
      $slug = '';
      $title = '';
      $projid = -1;

      if(session()->has('prev')){
         $prev = session('prev');

         $content = $prev['content'];
         $slug = $prev['slug'];
         $title = $prev['title'];
         $projid = $prev['projid'];
      }

      return view('admin.create_page', ['projects' => ProjectsController::getAll(),
      'content' => $content,
      'slug' => $slug, 'title' => $title, 'projid' => $projid, 'create'=>true]);
   }

   public function updatePagePage($prevslug, Request $req){
      if(!Projectpage::where('slug', $prevslug)->exists()){
         echo "page not found";
         return;
      }

      $page = Projectpage::where('slug', $prevslug)->first();

      $content = $page->content;
      $slug = $page->slug;
      $title = $page->title;
      $projid = $page->project_id;
      return view('admin.create_page', ['projects' => ProjectsController::getAllByDate(),
      'content' => $content,'slug' => $slug, 'title' => $title, 'projid' => $projid, 'create'=>false]);
   }

   public function createPage(Request $req){
      $errors = [];
      $haserror = false;
      if($req->slug == ''){
         $haserror = true;
         $errors[] = 'Please fill in a slug';
      }if($req->title == ''){
         $haserror = true;
         $errors[] = 'Please fill in a title';
      }
      if($req->prevslug == null){
         if(Projectpage::where('slug', $req->slug)->exists()){
            $errors[] = 'Bitch that page already exists';
            $haserror = true;
         }else{
            $page = new Projectpage;
         }
      }else{
         if(Projectpage::where('slug', $req->prevslug)->exists()){
            $page = Projectpage::where('slug', $req->prevslug)->first();
         }else{
            $page = new Projectpage;
         }
      }
      if($haserror){
         return redirect()->back()->withErrors($errors)->with('prev', [
            'slug' => $req->slug, 'title' => $req->title, 'projid' => $req->projectid,
            'content' => $req->htmlcontent
         ]);
      }

      if($req->save == "textwrite"){

         $page->slug = $req->slug;

         $page->title = $req->title;

         if($req->projectid != -1){
            $page->project_id = $req->projectid;
         }

         $page->content = $req->htmlcontent;
         $page->save();
      }
      Storage::disk('local')->put($req->slug . '.txt', $req->htmlcontent);
      return redirect('/admin/pages');
   }

   public function deletePage($slug){
      if(Projectpage::where('slug', $slug)->exists()){
         DB::delete("delete from projectpages where slug = '". $slug . "';");
      }else{
         echo 'no thats impossible, it doenst exist';
         return;
      }

      return redirect('/admin/pages');
   }

   public static function createUpdatePage($updateProjId = null){
      $project = null;
      if ($updateProjId != null) {
         $project = Project::find($updateProjId);
      }
      return view('admin.create_project', ['categories' => Category::all(), 'project' => $project]);
   }

   public static function showAlt($id){
      $page = Projectpage::find($id);
      $page->showalturl = !$page->showalturl;
      $page->save();
      return redirect()->back();
   }
}
