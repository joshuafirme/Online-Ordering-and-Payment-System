<?php

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
    return view('dashboard');
});

//Employee Login------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
Route::get('user-login', 'LoginCtr@index');
Route::post('user-login/login', 'LoginCtr@login');
Route::get('logout-employee', 'LoginCtr@logout');

//CUSTOMER------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
Route::get('customer/customer-login', 'Customer\loginCtr@index');
Route::get('google-login', 'Customer\GoogleLoginCtr@redirectToGoogle');
Route::get('google-login/callback', 'Customer\GoogleLoginCtr@handleGoogleCallback');
Route::get('user-login/google', 'Customer\LoginCtr@redirectToGoogle');
Route::get('user-login/google/callback', 'Customer\LoginCtr@handleGoogleCallback');

//GALLERY MAINTENANCE------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
Route::get('home', 'Customer\HomeCtr@index');

//GALLERY MAINTENANCE------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
Route::get('maintenance/gallery', 'Maintenance\GalleryCtr@index');
Route::post('maintenance/gallery/store', 'Maintenance\GalleryCtr@store');
Route::get('/maintenance/gallery/delete/{id}', 'Maintenance\GalleryCtr@delete');

//CATEGORY MAINTENANCE------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
Route::get('maintenance/category', 'Maintenance\CategoryCtr@index');
Route::post('maintenance/store', 'Maintenance\CategoryCtr@store');
Route::get('maintenance/category/show/{id}', 'Maintenance\CategoryCtr@show');
Route::post('maintenance/update', 'Maintenance\CategoryCtr@update');
Route::delete('maintenance/category/delete/{id}', 'Maintenance\CategoryCtr@delete');

//CASHIERING MAINTENANCE------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
Route::get('transaction/cashiering', 'Transaction\CashieringCtr@index'); 
Route::get('transaction/cashiering/search/{search_key}', 'Transaction\CashieringCtr@search');
Route::post('transaction/cashiering/add', 'Transaction\CashieringCtr@addToTray');
Route::post('transaction/cashiering/process', 'Transaction\CashieringCtr@process');
Route::get('transaction/cashiering/remove/{id}', 'Transaction\CashieringCtr@removeFromTray');

//REPORTS MAINTENANCE------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
Route::get('reports/gross_sale', 'Reports\GrossSaleCtr@index'); 

//MENU MAINTENANCE------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
Route::get('maintenance/menu', 'Maintenance\MenuCtr@index'); 
Route::get('maintenance/menu/show/{id}', 'Maintenance\MenuCtr@show'); 
Route::post('maintenance/menu/store', 'Maintenance\MenuCtr@store'); 
Route::post('maintenance/menu/update', 'Maintenance\MenuCtr@update');   
Route::delete('maintenance/menu/delete/{id}', 'Maintenance\MenuCtr@delete');

//UTILITIES------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
Route::get('utilities/user', 'Utilities\UserCtr@index'); 
Route::post('utilities/user/store', 'Utilities\UserCtr@store'); 
Route::post('utilities/user/update', 'Utilities\UserCtr@update'); 
Route::get('utilities/user/show/{id}', 'Utilities\UserCtr@showUserDetails'); 
Route::delete('utilities/user/delete/{id}', 'Utilities\UserCtr@deleteUser'); 




