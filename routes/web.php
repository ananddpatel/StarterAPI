<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/people', 'PeopleController@index');
Route::get('/people/{id}', 'PeopleController@show');
Route::get('/blogs', 'BlogController@index');
Route::get('/blogs/{id}', 'BlogController@show');