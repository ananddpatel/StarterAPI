<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/people', 'PeopleController@index');
Route::get('/people/{id}', 'PeopleController@show');
Route::get('/people/{id}/posts', 'PeopleController@posts');
Route::get('/blog', 'BlogController@index');
Route::get('/blog/{id}', 'BlogController@show');
Route::get('/comments', 'CommentController@index');
Route::get('/comments/{id}', 'CommentController@show');
