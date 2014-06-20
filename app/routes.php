<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});


Route::resource('pilotes', 'PilotesController');

Route::resource('courses', 'CoursesController');

Route::resource('scratches', 'ScratchesController');

Route::resource('categories', 'CategoriesController');

Route::resource('cats', 'CatsController');


Route::get('classements',function(){
	return View::make('classements');
});

Route::get('classements_v',function(){
	return View::make('classements_v');
});

Route::resource('points', 'PointsController');