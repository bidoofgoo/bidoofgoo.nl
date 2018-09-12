<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use App\Projectpage;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
   public function adminPage(){
      return view('admin.index');
   }

   public function viewPages(){
      $pages = Projectpage::all();

      return view('admin.pages', ['pages' => $pages]);
   }

   public function createPagePage(){
      $content = '<article><br><h2></h2><br><div class="artcontent"><br><div class="contentimg"><br></div><br></div><br></article>';
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

      return view('admin.create_page', ['projects' => ProjectsController::getAllByDate(),
      'content' => $content,
      'slug' => $slug, 'title' => $title, 'projid' => $projid, 'create'=>true]);
   }

   public function updatePagePage($prevslug){
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
      if(Projectpage::where('slug', $req->slug)->exists()){
         $page = Projectpage::where('slug',$req->slug)->first();
      }else{
         $page = new Projectpage;
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
}
