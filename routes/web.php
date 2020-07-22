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

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    return 'DONE'; //Return anything
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/dashboard', 'AdminController@index')->name('dashboard');


// ALL PROJECTS ROUTES
Route::get('/project/add-project', 'ProjectController@showAddProject')->name('showAddProject');
Route::post('/project/store-project', 'ProjectController@storeProject')->name('storeProject');
Route::get('/project/all-project', 'ProjectController@allProject')->name('allProject');
Route::get('/project/edit-project/{id}', 'ProjectController@editProject')->name('editProject');
Route::post('/project/update-project/{id}', 'ProjectController@updateProject')->name('updateProject');
Route::get('/project/delete-project/{id}', 'ProjectController@deleteProject')->name('deleteProject');

// ALL PRODUCTS ROUTES
Route::get('/product/add-product', 'ProductController@showAddProduct')->name('showAddProduct');
Route::post('/product/store-product', 'ProductController@storeProduct')->name('storeProduct');
Route::get('/product/all-product', 'ProductController@allProduct')->name('allProduct');
Route::get('/product/edit-product/{id}', 'ProductController@editProduct')->name('editProduct');
Route::post('/product/update-product/{id}', 'ProductController@updateProduct')->name('updateProduct');
Route::get('/product/delete-product/{id}', 'ProductController@deleteProduct')->name('deleteProduct');

// ALL CUSTOMER ROUTES
Route::get('/customer/add-customer', 'CustomerController@showAddCustomer')->name('showAddCustomer');
Route::post('/customer/store-customer', 'CustomerController@storeCustomer')->name('storeCustomer');
Route::get('/customer/all-customer', 'CustomerController@allCustomer')->name('allCustomer');
Route::get('/customer/edit-customer/{id}', 'CustomerController@editCustomer')->name('editCustomer');
Route::post('/customer/update-customer/{id}', 'CustomerController@updateCustomer')->name('updateCustomer');
Route::get('/customer/delete-customer/{id}', 'CustomerController@deleteCustomer')->name('deleteCustomer');

// ALL Employee ROUTES
Route::get('/employee/add-employee', 'CustomerController@showAddEmployee')->name('showAddEmployee');
Route::post('/employee/store-employee', 'CustomerController@storeEmployee')->name('storeEmployee');
Route::get('/employee/all-employee', 'CustomerController@allEmployee')->name('allEmployee');
Route::get('/employee/edit-employee/{id}', 'CustomerController@editEmployee')->name('editEmployee');
Route::post('/employee/update-employee/{id}', 'CustomerController@updateEmployee')->name('updateEmployee');
Route::get('/employee/delete-employee/{id}', 'CustomerController@deleteEmployee')->name('deleteEmployee');


// ALL Vendor ROUTES
Route::get('/vendor/add-vendor', 'CustomerController@showAddVendor')->name('showAddVendor');
Route::post('/vendor/store-vendor', 'CustomerController@storeVendor')->name('storeVendor');
Route::get('/vendor/all-vendor', 'CustomerController@allVendor')->name('allVendor');
Route::get('/vendor/edit-vendor/{id}', 'CustomerController@editVendor')->name('editVendor');
Route::post('/vendor/update-vendor/{id}', 'CustomerController@updateVendor')->name('updateVendor');
Route::get('/vendor/delete-vendor/{id}', 'CustomerController@deleteVendor')->name('deleteVendor');