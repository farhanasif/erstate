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
Route::get('/employee/add-employee', 'EmployeeController@showAddEmployee')->name('showAddEmployee');
Route::post('/employee/store-employee', 'EmployeeController@storeEmployee')->name('storeEmployee');
Route::get('/employee/all-employee', 'EmployeeController@allEmployee')->name('allEmployee');
Route::get('/employee/edit-employee/{id}', 'EmployeeController@editEmployee')->name('editEmployee');
Route::post('/employee/update-employee/{id}', 'EmployeeController@updateEmployee')->name('updateEmployee');
Route::get('/employee/delete-employee/{id}', 'EmployeeController@deleteEmployee')->name('deleteEmployee');


// ALL Vendor ROUTES
Route::get('/vendor/add-vendor', 'VendorController@showAddVendor')->name('showAddVendor');
Route::post('/vendor/store-vendor', 'VendorController@storeVendor')->name('storeVendor');
Route::get('/vendor/all-vendor', 'VendorController@allVendor')->name('allVendor');
Route::get('/vendor/edit-vendor/{id}', 'VendorController@editVendor')->name('editVendor');
Route::post('/vendor/update-vendor/{id}', 'VendorController@updateVendor')->name('updateVendor');
Route::get('/vendor/delete-vendor/{id}', 'VendorController@deleteVendor')->name('deleteVendor');

// ALL SALES ROUTES
Route::get('/sales/add-sales', 'SalesController@showAddSales')->name('showAddSales');
Route::post('/sales/store-sales', 'SalesController@storeSales')->name('storeSales');
Route::get('/sales/all-sales', 'SalesController@allSales')->name('allSales');
Route::get('/sales/edit-sales/{id}', 'SalesController@editSales')->name('editSales');
Route::post('/sales/update-sales/{id}', 'SalesController@updateSales')->name('updateSales');
Route::get('/sales/delete-sales/{id}', 'SalesController@deleteSales')->name('deleteSales');