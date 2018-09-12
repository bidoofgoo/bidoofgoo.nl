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
        return view('index', ['projectsviews'=> ProjectsController::getByViews(12),
        'projectsdate' => ProjectsController::getByDate(4)]);
    }

    public function projects(){
      return view('projects', ['projects' => ProjectsController::getAllByDate(),
                              'tags' => ProjectsController::getTags()]);
   }
}
