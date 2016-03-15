<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::get('/', function () {
    return view('index');
});

Route::group(
    ['prefix' => 'api'],
    function () {
        //Route::group(['middleware' => 'web'], function () {
          //  Route::auth();
        //});
        Route::get('/', 'HomeController@index');
        Route::post('login', 'Auth\AuthController@login');
        Route::get('logout', 'Auth\AuthController@logout');
        Route::post('register', 'Auth\AuthController@register');

        Route::put('profile/{id}', 'UsersController@show');
        Route::delete('profile/{id}', 'UsersController@destroy');

        Route::get('students', 'UsersController@index');
        Route::get('students/{id}', 'UsersController@show');

        Route::get('projects', 'ProjectsController@index');
        Route::post('projects', 'ProjectsController@store');
        Route::get('projects/{id}', 'ProjectsController@show');
        Route::put('projects/{id}', 'ProjectsController@update');
        Route::delete('projects/{id}', 'ProjectsController@destroy');
    }
);


