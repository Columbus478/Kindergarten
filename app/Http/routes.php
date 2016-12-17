<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', function () {
//     return view('auth.login');
// });
Route::GET('/','HomeController@home');
Route::GET('home/adminhome','HomeController@home');
//user registration page
Route::GET('auth/register','Auth\AuthController@getRegister');
Route::POST('auth/register','Auth\AuthController@postRegister');

//email confirmation
Route::GET('auth/confirm/email/{email}/confirmToken/{confirmToken}','Auth\AuthController@confirmRegister');

//Route for login
Route::GET('auth/login','Auth\AuthController@getLogin');
Route::POST('auth/login','Auth\AuthController@postLogin');

//Route for logout
Route::GET('auth/logout','Auth\AuthController@getLogout');
//Route::POST('auth/logout','Auth\AuthController@getLogout');

//route for reseting password.
Route::GET('password/email','Auth\PasswordController@getEmail');
Route::POST('password/email','Auth\PasswordController@postEmail');

Route::GET('password/reset/{token}','Auth\PasswordController@getReset');
Route::POST('password/reset','Auth\PasswordController@postReset');

//route for user
Route::GET('user','UserController@user');
Route::GET('user/profile','UserController@profile');
Route::POST('user/updateprofile','UserController@updateProfile');

Route::GET('user/password','UserController@passwordForm');
Route::POST('user/updatepassword','UserController@updatePassword');


//pages route
Route::GET('pages/contact','PagesController@contact');
Route::GET('pages/menus','PagesController@menus');
  // Route::POST('pages/menus','PagesControllercreatMenus');

Route::GET('pages/class','PagesController@classes');
Route::GET('pages/activityOfClasses','PagesController@activityOfClasses');
Route::GET('pages/babies','PagesController@babies');
Route::GET('pages/comment','PagesController@comment');
Route::GET('pages/diaries','PagesController@diaries');
   Route::POST('pages/diaries','PagesController@createDiary');
   Route::POST('pages/editdiary','PagesController@editDiary');
   Route::POST('pages/deletediary','PagesController@deleteDiary');
Route::GET('pages/health','PagesController@health');
   Route::POST('pages/health','PagesController@createHealth');
   Route::POST('pages/edithealth','PagesController@editHealth');
   Route::POST('pages/deletehealth','PagesController@deleteHealth');

Route::GET('pages/notification','PagesController@notification');
Route::GET('pages/parents','PagesController@parents');
   Route::POST('pages/parents','PagesController@createParent');
   Route::POST('pages/editparent','PagesController@editParent');
   Route::POST('pages/deleteparent','PagesController@deleteParent');

Route::GET('pages/schools','PagesController@schools');
   Route::POST('pages/createschool','PagesController@createSchool');
   Route::POST('pages/editschool','PagesController@editSchool');
   Route::POST('pages/deleteschool','PagesController@deleteSchool');

Route::GET('pages/teacher','PagesController@teacher');
   Route::POST('pages/createteacher','PagesController@createTeacher');
   Route::POST('pages/editteacher','PagesController@editTeacher');
   Route::POST('pages/deleteteacher','PagesController@deleteTeacher');




//Social Login
Route::get('social/{provider?}', 'SocialController@getSocialAuth');
Route::get('social/callback/{provider?}', 'SocialController@getSocialAuthCallback');



