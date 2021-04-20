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


Route::get('/', 'Customer\HomeCtr@index');

Route::get('dashboard', 'DashboardCtr@index');

//Employee Login------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
Route::get('user-login', 'LoginCtr@index');
Route::post('user-login/login', 'LoginCtr@login');
Route::get('logout-employee', 'LoginCtr@logout');

/*
|--------------------------------------------------------------------------
| Delivery
|--------------------------------------------------------------------------
*/
Route::get('/delivery/pending', 'Transaction\DeliveryCtr@displayPendingOrders');
Route::post('/delivery/do-prepare', 'Transaction\DeliveryCtr@doPrepare');
Route::post('/delivery/do-cancel', 'Transaction\DeliveryCtr@cancelOrder');

Route::get('/delivery/preparing', 'Transaction\DeliveryCtr@displayPreparingOrders');
Route::post('/delivery/do-dispatch', 'Transaction\DeliveryCtr@doDispatch');

Route::get('/delivery/dispatch', 'Transaction\DeliveryCtr@displayDispatchOrders');
Route::post('/delivery/do-deliver', 'Transaction\DeliveryCtr@doDeliver');

Route::get('/delivery/delivered', 'Transaction\DeliveryCtr@displayDeliveredOrders');

Route::get('/delivery/cancelled', 'Transaction\DeliveryCtr@displayCancelledOrders');

Route::get('/delivery/show-order/{order_no}', 'Transaction\DeliveryCtr@showOrders');
Route::get('/delivery/shipping-fee/{user_id}', 'Transaction\DeliveryCtr@getShippingFee_ajax');
Route::get('/delivery/total-amount/{order_no}/{user_id}', 'Transaction\DeliveryCtr@getOrderTotalAmount_ajax');
Route::get('/delivery/subtotal-amount/{order_no}', 'Transaction\DeliveryCtr@getOrderSubTotalAmount_ajax');
Route::get('/delivery/customer-info/{user_id}', 'Transaction\DeliveryCtr@getCustomerInfo_ajax');
Route::get('/delivery/shipping-info/{user_id}', 'Transaction\DeliveryCtr@getShippingInfo_ajax');

/*
|--------------------------------------------------------------------------
| Identity Verification
|--------------------------------------------------------------------------
*/
Route::get('/identity-verification', 'IdentityVerificationCtr@index');
Route::get('/showUploadDetails/{user_id}', 'IdentityVerificationCtr@showUploadDetails');
Route::post('/identity-verification/approve', 'IdentityVerificationCtr@approve');
Route::post('/identity-verification/decline', 'IdentityVerificationCtr@decline');


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

//CASHIERING------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
Route::get('transaction/cashiering', 'Transaction\CashieringCtr@index'); 
Route::get('transaction/cashiering/search/{search_key}', 'Transaction\CashieringCtr@search');
Route::post('transaction/cashiering/add', 'Transaction\CashieringCtr@addToTray');
Route::post('transaction/cashiering/process', 'Transaction\CashieringCtr@process');
Route::get('transaction/cashiering/remove/{id}', 'Transaction\CashieringCtr@removeFromTray');
Route::get('transaction/isQtyAvailable/{menu_id}/{qty}', 'Transaction\CashieringCtr@isQtyAvailable');
Route::post('/updateMenuStatus', 'Transaction\CashieringCtr@updateMenuStatus');

Route::get('transaction/delivery', 'Transaction\DeliveryCtr@index'); 

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



/*
|--------------------------------------------------------------------------
| Login
|--------------------------------------------------------------------------
*/
Route::get('customer/customer-login', 'Customer\loginCtr@index');
Route::post('do-login', 'Customer\LoginCtr@login');
Route::get('do-logout', 'Customer\LoginCtr@logout');

/*
|--------------------------------------------------------------------------
| Signup
|--------------------------------------------------------------------------
*/
Route::get('signup', 'Customer\SignupCtr@index');
Route::post('signup/do-signup', 'Customer\SignupCtr@signup');

Route::get('google-login', 'Customer\GoogleLoginCtr@redirectToGoogle');
Route::get('google-login/callback', 'Customer\GoogleLoginCtr@handleGoogleCallback');
Route::get('user-login/google', 'Customer\LoginCtr@redirectToGoogle');
Route::get('user-login/google/callback', 'Customer\LoginCtr@handleGoogleCallback');

Route::get('menu/beef_and_pork', 'Customer\homeCtr@beef_and_pork_view');
Route::get('menu/chicken_and_goat', 'Customer\homeCtr@chicken_and_goat_view');
Route::get('menu/vegetables_and_seafoods', 'Customer\homeCtr@vegetables_and_seafoods_view');
Route::get('menu/rice_and_soup', 'Customer\homeCtr@rice_and_soup_view');
Route::get('menu/noodles_and_bilao', 'Customer\homeCtr@noodles_and_bilao_view');
Route::get('menu/allday_breakfast', 'Customer\homeCtr@allday_breakfast_view');
Route::get('menu/value_meals', 'Customer\homeCtr@value_meals_view');
Route::get('menu/sizzling_plates', 'Customer\homeCtr@sizzling_plates_view');
Route::get('menu/combo_meals', 'Customer\homeCtr@combo_meals_view');

/*
|--------------------------------------------------------------------------
| Home
|--------------------------------------------------------------------------
*/
Route::get('menu', 'Customer\HomeCtr@displayMenu');
Route::get('menu/category/{category}', 'Customer\HomeCtr@displayMenuByCategory');
Route::get('/authCheck', 'Customer\HomeCtr@authCheck');

/*
|--------------------------------------------------------------------------
| Profile
|--------------------------------------------------------------------------
*/
Route::get('profile', 'Customer\ProfileCtr@index');
Route::post('profile', 'Customer\ProfileCtr@updateInsert');
Route::post('profile/upload-id', 'Customer\ProfileCtr@uploadID');

/*
|--------------------------------------------------------------------------
| Purchased History
|--------------------------------------------------------------------------
*/
Route::get('/purchased-history', 'Customer\PurchasedHistoryCtr@index');
Route::get('/sessionOrderNo/{order_no}', 'Customer\PurchasedHistoryCtr@sessionOrderNo');
Route::post('/purchased-history/cancel-order', 'Customer\PurchasedHistoryCtr@cancelOrder');

/*
|--------------------------------------------------------------------------
| Cart
|--------------------------------------------------------------------------
*/
Route::get('cart', 'Customer\CartCtr@index');
Route::get('cart/cart-count', 'Customer\CartCtr@getCartCount');
Route::post('cart/add', 'Customer\CartCtr@addToCart');
Route::post('cart/increase-qty/{menu_id}/{qty}', 'Customer\CartCtr@increaseQty');
Route::post('cart/decrease-qty/{menu_id}/{qty}', 'Customer\CartCtr@decreaseQty');
Route::post('cart/remove-menu/{menu_id}', 'Customer\CartCtr@removeMenu');
Route::get('cart/subtotal', 'Customer\CartCtr@computeSubTotal');


/*
|--------------------------------------------------------------------------
| Checkout
|--------------------------------------------------------------------------
*/
Route::get('checkout', 'Customer\CheckoutCtr@index');
Route::get('/checkout/computeTotal_ajax/{municipality}', 'Customer\CheckoutCtr@computeTotal_ajax');
Route::get('/checkout/getShippingFee_ajax/{municipality}', 'Customer\CheckoutCtr@getShippingFee_ajax');
Route::post('/checkout/placeOrder', 'Customer\CheckoutCtr@placeOrder');

//GCASH PAYMENT-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
Route::get('/payment/token={token}', 'Customer\PaymentCtr@index');
Route::get('/gcash-payment', 'Customer\PaymentCtr@gcashPayment')->name('gcashpayment');
Route::get('/cod', 'Customer\PaymentCtr@cashOnDelivery');
Route::get('/cod-confirmation', 'Customer\PaymentCtr@codConfirmation');
Route::get('/after-payment', 'Customer\PaymentCtr@afterPayment');

//gallery
Route::get('customer/gallery', 'Customer\GalleryCtr@index');
//comment and suggestion
Route::get('customer/comment-and-suggestion', 'Customer\CommentAndSuggestionCtr@index');
Route::post('customer/comment-and-suggestion/store', 'Customer\CommentAndSuggestionCtr@store');

//contact us
Route::get('/contact-us', 'Customer\ContactUsCtr@index');
Route::get('/contact-us/send-mail', 'Customer\ContactUsCtr@sendMail');

//TERMS
Route::get('terms-and-condition', 'Customer\SignupCtr@terms_and_condition');