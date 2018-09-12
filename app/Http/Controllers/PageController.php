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
         return view('page', ['page' => $page]);
      }else{
         echo "page not found";
      }
   }
}
