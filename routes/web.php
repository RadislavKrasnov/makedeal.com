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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', 'UserController@index')->name('developers');
Route::get('/user/{id}', 'UserController@profile')->name('profile');
Route::post('/removeTech', 'UserController@removeTechnology')->name('removeTech');
Route::post('/addTech', 'UserController@addTechnology')->name('addTech');
Route::get('/project', 'UserController@projectForm');
Route::post('/add_project', 'UserController@addProject');
Route::post('/projectDelete', 'UserController@projectDelete');