<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index', ['projectsviews'=> ProjectsController::getByViews(4),
        'projectsdate' => ProjectsController::getRecent(4), 'main' => True]);
    }

    public function projects($filter = null){
      $category = null;
      if ($filter != null) {
         $category = CategoryController::getTag($filter);
         $projects = ProjectsController::getAllWithTag($category);
      }else{
         $projects = ProjectsController::getAllByDate();
      }
      return view('projects', ['projects' => $projects,
                              'tags' => CategoryController::getTags(), 'category' => $category]);
   }
}
