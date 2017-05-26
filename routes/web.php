<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/people', 'PeopleController@index');
Route::get('/people/{id}', 'PeopleController@show');
Route::get('/people/{id}/blogs', 'PeopleController@blogs');
Route::get('/people/{id}/comments', 'PeopleController@comments');

Route::get('/blog', 'BlogController@index');
Route::get('/blog/{id}', 'BlogController@show');
Route::get('/blog/{id}/comments', 'BlogController@comments');
Route::post('/blog', 'BlogController@store');

Route::get('/comments', 'CommentController@index');
Route::get('/comments/{id}', 'CommentController@show');

