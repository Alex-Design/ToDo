<?php

use Illuminate\Support\Facades\Route;

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

// Base route
Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

// Standard navigation routes
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/complete', 'HomeController@completeList')->name('completeList');

// Task modification routes
Route::post('/task/add', 'HomeController@addTask')->name('addTask');
Route::post('/task/complete', 'HomeController@completeTask')->name('completeTask');
Route::post('/task/incomplete', 'HomeController@incompleteTask')->name('incompleteTask');