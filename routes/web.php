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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/dashboard', 'AdminController@index')->name('dashboard');


// ALL PROJECT ROUTES
Route::get('/project/add-project', 'ProjectController@showAddProject')->name('showAddProject');
Route::post('/project/store-project', 'ProjectController@storeProject')->name('storeProject');
Route::get('/project/all-project', 'ProjectController@allProject')->name('allProject');
Route::get('/project/edit-project/{id}', 'ProjectController@editProject')->name('editProject');
Route::post('/project/update-project/{id}', 'ProjectController@updateProject')->name('updateProject');
Route::get('/project/delete-project/{id}', 'ProjectController@deleteProject')->name('deleteProject');