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
Route::put('/user-info', 'UserController@updateInfo');
Route::post('/update-avatar', 'PhotoController@update')->name('updateAvatar');

//TechnologyController
Route::post('/removeTech', 'TechnologyController@removeTechnology')->name('removeTech');
Route::post('/addTech', 'TechnologyController@addTechnology')->name('addTech');

//ProjectController
Route::get('/project', 'ProjectController@projectForm');
Route::post('/add_project', 'ProjectController@addProject');
Route::post('/projectDelete', 'ProjectController@projectDelete');

//CommentController
Route::post('/sendComment', 'CommentController@sendComment')->name('sendComment');
Route::post('/sendReply', 'CommentController@sendReply')->name('sendReply');

//CompanyController
Route::post('/companyDelete', 'CompanyController@companyDelete')->name('companyDelete');
Route::post('/company', 'CompanyController@addCompany');

//ContactController
Route::post('/add_contacts', 'ContactController@addContact');
Route::post('/add_email', 'ContactController@addEmail');

//RegionController
Route::post('/regions', 'RegionController@selectRegions')->name('regions');
Route::post('/cities', 'CityController@selectCities')->name('cities');



Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::prefix('admin')->group(function () {
    Route::get('login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Auth\AdminLoginController@login')->name('admin.login');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

    //Forgot my password routes
    Route::get('password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
    Route::post('password/reset', 'Auth\AdminResetPasswordController@reset');
    // Matches The "/admin/users" URL
});