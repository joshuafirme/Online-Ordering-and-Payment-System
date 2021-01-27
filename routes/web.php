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

//CATEGORY MAINTENANCE
Route::get('maintenance/category', 'Maintenance\CategoryCtr@index');
Route::post('maintenance/store', 'Maintenance\CategoryCtr@store');
Route::get('maintenance/category/show/{id}', 'Maintenance\CategoryCtr@show');
Route::post('maintenance/update', 'Maintenance\CategoryCtr@update');
Route::delete('maintenance/category/delete/{id}', 'Maintenance\CategoryCtr@delete');

//GALLERY MAINTENANCE
Route::get('maintenance/gallery', 'Maintenance\GalleryCtr@index'); 
Route::get('maintenance/gallery/show/{id}', 'Maintenance\GalleryCtr@show'); 
Route::post('maintenance/gallery/store', 'Maintenance\GalleryCtr@store'); 
Route::post('maintenance/gallery/update', 'Maintenance\GalleryCtr@update'); 
Route::get('maintenance/menu/{category}', 'Maintenance\GalleryCtr@getMenu');  
Route::delete('maintenance/gallery/delete/{id}', 'Maintenance\GalleryCtr@delete');

