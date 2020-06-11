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
    return view('home');
});

Auth::routes();

Route::get('/admin', 'AdminController@index')->name('admin')->middleware('CheckAdmin');
Route::resource('teachers', 'TeacherController')->middleware('CheckAdmin');
Route::resource('modules', 'ModuleController')->middleware('CheckAdmin');

Route::resource('dashboard', 'DashboardController');
Route::resource('deadlines', 'DeadlineController');
Route::post('/sort', 'DeadlineController@sortRequest');
