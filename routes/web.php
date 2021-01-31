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

Route::get('user-login', 'LoginCtr@index');
Route::post('user-login/login', 'LoginCtr@login');


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
