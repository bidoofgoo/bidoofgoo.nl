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
Route::get('/project/{slug}', 'PageController@makeProjectPage');
Route::get('/katcavia', 'PageController@katCavia')->name('katcavia');

Route::group([ 'middleware' => 'auth'], function(){
   Route::get('/admin', 'AdminController@adminPage')->name('admin');
   Route::get('/admin/makepage', 'AdminController@createPagePage')->name('createpagepage');
   Route::get('/admin/makepage/{prevslug}', 'AdminController@updatePagePage')->name('updatepagepage');
   Route::get('/admin/deletePage/{slug}', 'AdminController@deletePage');
   Route::post('/admin/createpage', 'AdminController@createPage');
   Route::get('/admin/pages', 'AdminController@viewPages');
});

Route::get('/upClicks/{id}', 'ProjectsController@upclicks');
