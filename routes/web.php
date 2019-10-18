<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/thislinkshouldnotbefound', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/projects', 'HomeController@projects')->name('projects');
Route::get('/projects/{filter}', 'HomeController@projects');
Route::get('/project/{slug}', 'PageController@makeProjectPage');
Route::get('/deleteThisHacker', function(){
   return view('deleteThisHacker');
});

Route::group([ 'middleware' => 'auth'], function(){
   Route::get('/admin', 'AdminController@adminPage')->name('admin');
   Route::get('/admin/makepage', 'PageController@createPagePage')->name('createpagepage');
   Route::get('/admin/makepage/{prevslug}', 'PageController@updatePagePage')->name('updatepagepage');
   Route::get('/admin/deletePage/{slug}', 'PageController@deletePage');
   Route::post('/admin/createpage', 'PageController@createPage');
   Route::get('/admin/makeproject', 'ProjectsController@createProjectPage');
   Route::get('/admin/makeProject/{editing}', 'ProjectsController@createProjectPage');
   Route::get('/admin/deleteProject/{id}', 'ProjectsController@deleteProject');
   Route::post('/admin/createproject', 'ProjectsController@createProject');
   Route::get('/admin/pages/showAlt/{id}', 'PageController@showAlt');
   Route::get('/admin/pages', 'AdminController@viewPages');
   Route::get('/admin/projects', 'AdminController@viewProjects');
   Route::get('/admin/activateAll', 'ProjectsController@activateAllProjects');
   Route::get('/admin/activate{projid}', 'ProjectsController@activateProject');
   Route::get('/admin/categories', 'AdminController@viewCategories');
   Route::get('/admin/deletecategory{id}', 'CategoryController@deleteCategory');
   Route::post('/admin/postcategory', 'CategoryController@postCategory');
});

Route::get('/upClicks/{id}', 'ProjectsController@upclicks');
