<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;

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
          'projectsdate' => ProjectsController::getRecent(4), 'main' => true, 'age' => HomeController::getAge("04/05/1997")]);
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

   public function contact(){
     return view('contact');
   }

   public function getAge($date)
   {
       $dob = new DateTime($date);

       $now = new DateTime();

       $difference = $now->diff($dob);

       $age = $difference->y;

       return  $age;
   }
}
