<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


//Public Routes
Route::get('/', function () {
    return redirect()->route('user.bike.showAll');
});

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home.index');
Route::get('/about', 'App\Http\Controllers\HomeController@about')->name('home.about');
Route::get('/contact', 'App\Http\Controllers\HomeController@contact')->name('home.contact');

Route::get('/user/bike/show/{id}', 'App\Http\Controllers\User\BikeController@show')->name("user.bike.show");
Route::get('/cart', 'App\Http\Controllers\CartController@index')->name("cart.index");
Route::get('/cart/add/{id}', 'App\Http\Controllers\CartController@add')->name("cart.add");
Route::get('/cart/remove/{id}', 'App\Http\Controllers\CartController@remove')->name("cart.remove");
Route::get('/cart/removeAll', 'App\Http\Controllers\CartController@removeAll')->name("cart.removeAll");
Route::get('set-locale/{locale}','App\Http\Controllers\LanguageController@switchLang')->middleware('check.locale')->name('locale.setting');
Route::get('/partner', 'App\Http\Controllers\PartnerController@index')->name("partner.index");
Route::get('/bikes/all', 'App\Http\Controllers\User\BikeController@showAll')->name("user.bike.showAll");
Route::get('/bikes/search-product', 'App\Http\Controllers\User\BikeController@search_products')->name("user.bike.search-product");
Route::get('/bikes/clear-search-product', 'App\Http\Controllers\User\BikeController@clear_search_products')->name("user.bike.clear-search-product");

Route::get('/bikes/sort-product', 'App\Http\Controllers\User\BikeController@sort_products')->name("user.bike.sort-product");


//Admin Routes
Route::middleware(['auth.role:admin'])->group(function () {
    //Put all admin routes with prefix /admin
    Route::get('/admin', 'App\Http\Controllers\Admin\AdminController@index')->name('admin.index');
    Route::get('/admin/part/', 'App\Http\Controllers\Admin\PartController@showAll')->name('admin.part.showall');
    Route::get('/admin/part/create', 'App\Http\Controllers\Admin\PartController@create')->name('admin.part.create');
    Route::post('/admin/part/save', 'App\Http\Controllers\Admin\PartController@save')->name('admin.part.save');
    Route::get('/admin/part/show/{id}', 'App\Http\Controllers\Admin\PartController@show')->name('admin.part.show');
    Route::post('/admin/part/update/{id}', 'App\Http\Controllers\Admin\PartController@update')->name('admin.part.update');
    Route::delete('/admin/part/remove/{id}', 'App\Http\Controllers\Admin\PartController@remove')->name('admin.part.remove');
    Route::get('/admin/bike/', 'App\Http\Controllers\Admin\BikeController@showAll')->name("admin.bike.showAll");
    Route::get('/admin/bike/create', 'App\Http\Controllers\Admin\BikeController@create')->name("admin.bike.create");
    Route::post('/admin/bike/save', 'App\Http\Controllers\Admin\BikeController@save')->name("admin.bike.save");
    Route::get('/admin/bike/show/{id}', 'App\Http\Controllers\Admin\BikeController@show')->name("admin.bike.show");
    Route::delete('admin/bike/remove/{id}', 'App\Http\Controllers\Admin\BikeController@remove')->name("admin.bike.remove");
    Route::get('admin/bike/update/{id}', 'App\Http\Controllers\Admin\BikeController@update')->name("admin.bike.update");
    Route::patch('admin/bike/save/update/{id}', 'App\Http\Controllers\Admin\BikeController@saveUpdate')->name("admin.bike.save.update");
    Route::delete('admin/review/delete/{id}', 'App\Http\Controllers\Admin\ReviewController@delete')->name("admin.review.delete");

    Route::get('/admin/order/unpayment', 'App\Http\Controllers\Admin\OrderController@showUnpayment')->name("admin.order.showUnpayment");
    Route::get('/admin/order/payment', 'App\Http\Controllers\Admin\OrderController@showPayment')->name("admin.order.showPayment");
    Route::get('/admin/order/ondelivery', 'App\Http\Controllers\Admin\OrderController@showDelivery')->name("admin.order.showDelivery");
    Route::get('/admin/order/success', 'App\Http\Controllers\Admin\OrderController@showSuccess')->name("admin.order.success");
    // Route::get('/admin/order/create', 'App\Http\Controllers\Admin\OrderController@create')->name("admin.order.create");
    // Route::post('/admin/order/save', 'App\Http\Controllers\Admin\OrderController@save')->name("admin.order.save");
    Route::get('/admin/order/show/{id}', 'App\Http\Controllers\Admin\OrderController@show')->name("admin.order.show");
    Route::delete('admin/order/remove/{id}', 'App\Http\Controllers\Admin\OrderController@remove')->name("admin.order.remove");
    // Route::get('admin/order/update/{id}', 'App\Http\Controllers\Admin\OrderController@update')->name("admin.order.update");
    Route::patch('admin/order/save/update/{id}', 'App\Http\Controllers\Admin\OrderController@saveUpdatePayment')->name("admin.order.save.updatePayment");
    Route::patch('admin/order/save/update-resi/{id}', 'App\Http\Controllers\Admin\OrderController@saveUpdateResi')->name("admin.order.save.updateResi");
    Route::patch('admin/order/save/removeDelivery/{id}', 'App\Http\Controllers\Admin\OrderController@saveRemoveDelivery')->name("admin.order.save.removeDelivery");
    Route::patch('admin/order/save/closeDelivery/{id}', 'App\Http\Controllers\Admin\OrderController@saveCloseDelivery')->name("admin.order.save.closeDelivery");


    Route::get('/admin/bank/', 'App\Http\Controllers\Admin\BankController@showAll')->name("admin.bank.showAll");
    Route::post('/admin/bank/save', 'App\Http\Controllers\Admin\BankController@save')->name("admin.bank.save");
    Route::delete('admin/bank/remove/{id}', 'App\Http\Controllers\Admin\BankController@remove')->name("admin.bank.remove");
    Route::patch('admin/bank/save/update/{id}', 'App\Http\Controllers\Admin\BankController@saveUpdate')->name("admin.bank.save.update");

    Route::get('/admin/user/', 'App\Http\Controllers\Admin\UserController@showAll')->name("admin.user.showAll");
    Route::get('/admin/customers/', 'App\Http\Controllers\Admin\UserController@showCustomers')->name("admin.user.showCustomers");
    Route::post('/admin/user/save', 'App\Http\Controllers\Admin\UserController@save')->name("admin.user.save");
    Route::patch('admin/user/save/update/{id}', 'App\Http\Controllers\Admin\UserController@saveUpdate')->name("admin.user.save.update");
    Route::delete('admin/user/remove/{id}', 'App\Http\Controllers\Admin\UserController@remove')->name("admin.user.remove");
});


//User routes
Route::middleware(['auth.role:user'])->group(function () {
    //Put all user routes with prefix /user
    Route::get('/user', 'App\Http\Controllers\User\UserController@index')->name('user.index');
    Route::get('/user/bike/showAll', 'App\Http\Controllers\User\BikeController@showAll')->name("users.bike.showAll");
    Route::get('/user/bike/create', 'App\Http\Controllers\User\BikeController@create')->name("user.bike.create");
    Route::post('/user/bike/save', 'App\Http\Controllers\User\BikeController@save')->name("user.bike.save");
    Route::delete('user/bike/remove/{id}', 'App\Http\Controllers\User\BikeController@remove')->name("user.bike.remove");
    Route::get('user/bike/update/{id}', 'App\Http\Controllers\User\BikeController@update')->name("user.bike.update");
    Route::patch('user/bike/save/update/{id}', 'App\Http\Controllers\User\BikeController@saveUpdate')->name("user.bike.save.update");
    Route::get('user/review/create/{id}', 'App\Http\Controllers\User\ReviewController@create')->name("user.review.create");
    Route::post('user/review/save/{id}', 'App\Http\Controllers\User\ReviewController@save')->name("user.review.save");
    Route::delete('user/review/delete/{id}', 'App\Http\Controllers\User\ReviewController@delete')->name("user.review.delete");
    Route::get('/user/part/', 'App\Http\Controllers\User\PartController@showAll')->name('user.part.showall');
    Route::get('/user/part/show/{id}', 'App\Http\Controllers\User\PartController@show')->name('user.part.show');
    Route::get('/user/config/', 'App\Http\Controllers\User\UserController@config')->name('user.conf');
    Route::post('/user/config/update/', 'App\Http\Controllers\User\UserController@updateConfig')->name('user.update.conf');
    Route::post('/user/order/save', 'App\Http\Controllers\User\OrderController@save')->name("user.order.save");
    Route::get('/user/order/', 'App\Http\Controllers\User\OrderController@showAll')->name("user.order.showAll");

    Route::patch('user/order/save/update/{id}', 'App\Http\Controllers\User\OrderController@saveUpdatePaymentTransfers')->name("user.order.save.updatePaymentTransfers");
    Route::delete('user/order/remove/{id}', 'App\Http\Controllers\Admin\OrderController@remove')->name("user.order.remove");

    Route::get('user/get-provinces', 'App\Http\Controllers\User\OrderController@province')->name('user.get.provinces');
    Route::get('user/get-cities', 'App\Http\Controllers\User\OrderController@city')->name('user.get.cities');
    Route::post('user/check-ongkir', 'App\Http\Controllers\User\OrderController@checkOngkir')->name('user.check-ongkir');

    Route::get('user/whishlist/add/{id}', 'App\Http\Controllers\User\WhishlistController@save')->name("user.whishlist.add");
    Route::get('user/whishlist/all', 'App\Http\Controllers\User\WhishlistController@showAll')->name("user.whishlist.showAll");
    Route::get('user/whishlist/remove/{id}', 'App\Http\Controllers\User\WhishlistController@remove')->name("user.whishlist.remove");
});

Route::get('locale/{locale}','App\Http\Controllers\LanguageController@switchLang')->name('locale');


Auth::routes();
