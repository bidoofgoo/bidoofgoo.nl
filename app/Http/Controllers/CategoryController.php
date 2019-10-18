<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Category;
use App\ProCatLink;

class CategoryController extends Controller
{

      public static function getTags(){
         return Category::all();
      }

      public static function getTag($name){
         return Category::where('name', $name)->first();
      }

      public static function postCategory(Request $req){
         if ($req->id == 0) {
            $cat = new Category;
         }else{
            $cat = Category::find($req->id);
         }

         $cat->name = $req->name;
         if ($req->description != null) {
            $cat->description = $req->description;
         }else{
            $cat->description = "";
         }
         $cat->color = $req->color;

         $cat->save();

         return redirect()->back();
      }

      public static function deleteCategory($id){
         Category::find($id)->delete();

         return redirect()->back();
      }
}
