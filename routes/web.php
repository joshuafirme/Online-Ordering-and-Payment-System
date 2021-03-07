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
//use App\Utilities\User;

Route::get('dashboard', 'DashboardCtr@index');

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

//GCASH PAYMENT-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
Route::get('/payment', 'Customer\PaymentCtr@index');
Route::get('/gcash-payment', 'Customer\PaymentCtr@gcashPayment')->name('gcashpayment');

//gallery
Route::get('customer/gallery', 'Customer\GalleryCtr@index');
//comment and suggestion
Route::get('customer/comment-and-suggestion', 'Customer\CommentAndSuggestionCtr@index');
Route::post('customer/comment-and-suggestion/store', 'Customer\CommentAndSuggestionCtr@store');

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
Route::get('reports/gross_sale/computeTotalSales/{date_from}/{date_to}', 'Reports\GrossSaleCtr@computeTotalSales'); 
Route::get('reports/gross_sale/previewPDF/{date_from}/{date_to}', 'Reports\GrossSaleCtr@previewPDF');

//Customer Information
Route::get('reports/customer-info', 'Reports\CustomerInfoCtr@index'); 

//Best Seller
Route::get('reports/best-seller', 'Reports\BestSellerCtr@index'); 

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

//comment and suggestion
Route::get('utilities/comment-and-suggestion', 'Utilities\CommentAndSuggestionCtr@index');

//backup and restore
Route::get('utilities/backup-and-restore', 'Utilities\BackupAndRestoreCtr@index');
Route::post('utilities/backup-and-restore/backup', 'Utilities\BackupAndRestoreCtr@backup');
Route::post('utilities/backup-and-restore/restore', 'Utilities\BackupAndRestoreCtr@restore');
//audit trail
Route::get('utilities/audit-trail', 'Utilities\AuditTrailCtr@index');




