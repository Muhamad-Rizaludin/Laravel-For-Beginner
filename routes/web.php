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

Route::get('/', function () {
    return view('welcome', ['title' => 'Seri Belajar']);
});

Route::get('home', function(){
    return view('home');
});

Route::get('edulevels','App\Http\Controllers\EdulevelController@data');
Route::get('edulevels/add','App\Http\Controllers\EdulevelController@add');
Route::post('edulevels','App\Http\Controllers\EdulevelController@addProcess');
Route::get('edulevels/edit/{id}','App\Http\Controllers\EdulevelController@edit');
Route::patch('edulevels/{id}','App\Http\Controllers\EdulevelController@editProcess');
Route::delete('edulevels/{id}','App\Http\Controllers\EdulevelController@delete');

Route::resource('programs','App\Http\Controllers\ProgramController');