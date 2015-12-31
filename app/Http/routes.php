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

Route::group(['middleware' => ['web']], function () {
    Route::get('/', 'PagesController@home');
    Route::get('/about', 'PagesController@about');
    Route::get('/contact', 'TicketsController@create');
    Route::post('/contact', 'TicketsController@store');
    Route::get('/tickets', 'TicketsController@index');
    Route::get('/ticket/{slug?}', 'TicketsController@show');
    Route::get('/ticket/{slug?}/edit', 'TicketsController@edit');
    Route::post('/ticket/{slug?}/edit', 'TicketsController@update');
    Route::post('/ticket/{slug?}/delete', 'TicketsController@destroy');
    Route::post('/comment', 'CommentsController@newComment');

    Route::get('sendemail', function () {

        $data = array(
            'name' => "Learning Laravel",
        );

        Mail::send('emails.welcome', $data, function ($message) {

            $message->from('corean@corean.biz', 'Learning Laravel');

            $message->to('triple@corean.biz')->subject('Learning Laravel test email');

        });

        return "Your email has been sent successfully";

    });
});
