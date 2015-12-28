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


use Illuminate\Support\Facades\Route;



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

Route::group(['middleware' => ['web']], function () {
    Route::get('/', 'PagesController@home');
    Route::get('/about', 'PagesController@about');
    Route::get('/contact', 'TicketsController@create');
    Route::post('/contact', 'TicketsController@store');
    Route::get('/tickets', 'TicketsController@index');
    Route::get('tickets/{slug?}', 'TicketsController@show');
    Route::get('/tickets/{slug?}/edit','TicketsController@edit');
    Route::post('/tickets/{slug?}/edit','TicketsController@update');
    Route::get('/tickets/{slug?}/delete','TicketsController@destroy');
    Route::post('/comment', 'CommentsController@newComment');
    Route::get('users/register', 'Auth\AuthController@getRegister');
    Route::post('users/register', 'Auth\AuthController@postRegister');
    Route::get('users/login', 'Auth\AuthController@getLogin');
    Route::post('users/login', 'Auth\AuthController@postLogin');


    Route::get('sendemail', function () {
        $data = array(
            'name' => "Learning Laravel",
        );
        Mail::send('emails.welcome', $data, function ($message) {
            $message->from('erol@erol.ee', 'Learning Laravel');
            $message->to('erol@erol.ee')->subject('Learning Laravel test email');
        });
        return "Your email has been sent successfully";
    });
});

// Route::get('users/logout', 'Auth\AuthController@getLogout');
Route::get('/home', 'HomeController@index');

Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::get('users/logout', 'Auth\AuthController@logout');
    Route::get('/home', 'HomeController@index');

    Route::group(array('prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'manager'), function () {
        Route::get('users', 'UsersController@index');
        Route::get('roles', 'RolesController@index');
        Route::get('roles/create', 'RolesController@create');
        Route::post('roles/create', 'RolesController@store');
        Route::get('users/{id?}/edit', 'UsersController@edit');
        Route::post('users/{id?}/edit','UsersController@update');
        Route::get('/', 'PagesController@home');
        Route::get('posts', 'PostsController@index');
        Route::get('posts/create', 'PostsController@create');
        Route::post('posts/create', 'PostsController@store');
        Route::get('posts/{id?}/edit', 'PostsController@edit');
        Route::post('posts/{id?}/edit','PostsController@update');
    });
});

