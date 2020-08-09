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

Route::middleware('auth')->group(function () {
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

    // ALL item ROUTES
    Route::get('/item/add-item', 'ItemController@showAddItem')->name('showAddItem');
    Route::post('/item/store-item', 'ItemController@storeItem')->name('storeItem');
    Route::get('/item/all-item', 'ItemController@allItem')->name('allItem');
    Route::get('/item/edit-item/{id}', 'ItemController@editItem')->name('editItem');
    Route::post('/item/update-item/{id}', 'ItemController@updateItem')->name('updateItem');
    Route::get('/item/delete-item/{id}', 'ItemController@deleteItem')->name('deleteItem');

    // ALL requisition ROUTES
    Route::get('/requisition/add-requisition', 'RequisitionController@showAddRequisition')->name('showAddRequisition');
    Route::post('/requisition/store-requisition', 'RequisitionController@storeRequisition')->name('storeRequisition');
    Route::get('/requisition/all-requisition', 'RequisitionController@allRequisition')->name('allRequisition');
    Route::get('/requisition/edit-requisition/{id}', 'RequisitionController@editRequisition')->name('editRequisition');
    Route::post('/requisition/update-requisition/{id}', 'RequisitionController@updateRequisition')->name('updateRequisition');
    Route::get('/requisition/delete-requisition/{id}', 'RequisitionController@deleteRequisition')->name('deleteRequisition');

    // ALL requisition details ROUTES
    Route::get('/requisition-details/add-requisition-details', 'RequisitionDetailsController@showAddRequisitionDetails')->name('showAddRequisitionDetails');
    Route::post('/requisition-details/store-requisition-details', 'RequisitionDetailsController@storeRequisitionDetails')->name('storeRequisitionDetails');
    Route::get('/requisition-details/all-requisition-details', 'RequisitionDetailsController@allRequisitionDetails')->name('allRequisitionDetails');
    Route::get('/requisition-details/edit-requisition-details/{id}', 'RequisitionDetailsController@editRequisitionDetails')->name('editRequisitionDetails');
    Route::post('/requisition-details/update-requisition-details/{id}', 'RequisitionDetailsController@updateRequisitionDetails')->name('updateRequisitionDetails');
    Route::get('/requisition-details/delete-requisition-details/{id}', 'RequisitionDetailsController@deleteRequisitionDetails')->name('deleteRequisitionDetails');
        
    //--------Bank ROUTES---------//
    Route::resource('banks', 'BankController::class');
    Route::post('/banks_update', 'BankController@update')->name('banks_update');
    Route::post('/delete_bank','BankController@destroy')->name('delete_bank');

    //--------Ledger Type ROUTEs------//
    Route::resource('ltype', 'LtypeController');
    Route::post('/ledgertype_update', 'LtypeController@update')->name('ledgertype_update');

    //--------Ledger Group ROUTEs------//
    Route::resource('lgroup', 'LgroupController');
    Route::post('/ledgergroup_update', 'LgroupController@update')->name('ledgergroup_update');

    //--------Ledger Name ROUTEs------//
    Route::resource('lname', 'LnameController');
    Route::post('/ledgername_update', 'LnameController@update')->name('ledgername_update');
    Route::post('/ledgername_delete','LnameController@destroy')->name('ledgername_delete');

    //--------Initial Balance ROUTEs------//
    Route::resource('initial', 'InitialController');
    Route::get('/initialledger', 'InitialController@ledgerIndex')->name('initialledger');

    Route::get('/creditvoucher','VoucherController@creditvoucher')->name('creditvoucher');
    Route::post('/save_credit','VoucherController@save_credit')->name('save_credit');
});