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

//MENU CATEGORY AND MAINTENANCE
Route::get('maintenance/menu_category', 'Maintenance\CategoryAndMenuCtr@index');
Route::post('maintenance/store', 'Maintenance\CategoryAndMenuCtr@store');
Route::get('maintenance/category_menu/show/{id}', 'Maintenance\CategoryAndMenuCtr@show');
Route::post('maintenance/update', 'Maintenance\CategoryAndMenuCtr@update');
Route::delete('maintenance/category_menu/delete/{id}', 'Maintenance\CategoryAndMenuCtr@delete');

//GALLERY MAINTENANCE
Route::get('maintenance/gallery', 'Maintenance\GalleryCtr@index'); 
Route::get('maintenance/gallery/show/{id}', 'Maintenance\GalleryCtr@show'); 
Route::post('maintenance/gallery/store', 'Maintenance\GalleryCtr@store'); 
Route::post('maintenance/gallery/update', 'Maintenance\GalleryCtr@update'); 
Route::get('maintenance/menu/{category}', 'Maintenance\GalleryCtr@getMenu');  
Route::delete('maintenance/gallery/delete/{id}', 'Maintenance\GalleryCtr@delete');

