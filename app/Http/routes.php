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

Route::get('/', function() {
    return view('index');
});

Route::group(
    ['middleware' => 'web'],
    function () {
        Route::group(
            ['prefix' => 'api'],
            function () {
                Route::get('projects/{id}', 'ProjectsController@show');
                Route::post('projects', 'ProjectsController@store');
            }
        );
    }
);
Route::group(
    ['prefix' => 'api'],
    function () {
        Route::get('/', 'HomeController@index');
        Route::get('user/{id}', 'StudentsController@index');
        Route::get('students', 'StudentsController@index');
        Route::get('students/{id}', 'StudentsController@show');
        Route::get('students/{id}/projects', 'ProjectsController@showByStudentId');
        Route::get('projects', 'ProjectsController@index');
        Route::get('projects/{id}', 'ProjectsController@show');
    }
);
