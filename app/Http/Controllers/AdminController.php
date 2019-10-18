<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use App\Projectpage;
use App\Project;
use App\Category;
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

   public static function viewProjects(){
      $projects = Project::all();
      return view('admin.projects', ['projects' => $projects]);
   }

   public static function viewCategories(){
      $tags = Category::all();
      return view('admin.categories', ['tags' => $tags]);
   }

}
