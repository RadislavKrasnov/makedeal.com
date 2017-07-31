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

//UserController
Route::get('/', 'UserController@index')->name('developers');
Route::get('/user/{id}', 'UserController@profile')->name('profile');

//TechnologyController
Route::post('/removeTech', 'TechnologyController@removeTechnology')->name('removeTech');
Route::post('/addTech', 'TechnologyController@addTechnology')->name('addTech');

//ProjectController
Route::get('/project', 'ProjectController@projectForm');
Route::post('/add_project', 'ProjectController@addProject');
Route::post('/projectDelete', 'ProjectController@projectDelete');

//CommentController
Route::post('/sendComment', 'CommentController@sendComment')->name('sendComment');

//CompanyController
Route::post('/companyDelete', 'CompanyController@companyDelete')->name('companyDelete');
Route::post('/company', 'CompanyController@addCompany');

