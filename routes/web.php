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

/* Route::get('/', function () {
    return view('index');
}); */

//Route::resource('user', 'UserController');
Route::resource('art', 'ArtController');
Route::resource('tattoo', 'ArtController');
Route::resource('image', 'ImageController');
Route::resource('event', 'EventController');
Route::resource('video', 'VideoController');
Route::get('/sendemail', 'SendEmailController@ship')->name('sendemail');
Route::get('/stripe', 'StripePaymentController@stripe');
Route::post('/stripe', 'StripePaymentController@stripePost')->name('stripe.post');

Auth::routes(['verify'=>true]);

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/art', 'ArtController@index')->name('art');
//Route::get('/event', 'EventController@index')->name('event');
//Route::get('/tattoo', 'HomeController@index')->name('tattoo');
Route::get('/about', 'HomeController@about')->name('about');
Route::get('/contact', 'HomeController@contact')->name('contact');

// Route::get('/paypal', 'PayPalController@show')->name('paypal.payment.show');

//Route::resource('/paypal', 'PayPalController');
Route::middleware(['auth','verified', 'role:admin'])->group(function () {
    // contains all dashboard routes

    Route::prefix('admin')->group(function () {
        Route::get('dashboard', 'Dashboard\AdminController@dashboard')->name('dashboard');
        Route::post('dashboard/image-upload', 'ImageController@store')->name('image.upload.post');
        Route::get('dashboard/image-upload', 'ImageController@create')->name('image.upload');
        Route::post('dashboard/arts', 'ArtController@store')->name('art.save');
        Route::post('dashboard/arts-update', 'ArtController@update')->name('art.update');
        Route::get('dashboard/arts', 'ArtController@create')->name('art.see');
        Route::post('dashboard/event', 'EventController@store')->name('event.save');
        Route::get('dashboard/event', 'EventController@create')->name('event.see');
        Route::post('dashboard/eventSearch', 'EventController@search')->name('event.search');
        Route::get('dashboard/event-and-art-control', 'EventArtController@create')->name('eventOrArt.show');
        Route::get('dashboard/event-and-art-control-edit', 'EventArtController@edit')->name('eventOrArt.update');
        Route::get('dashboard/event-art-delate', 'EventArtController@destroy')->name('eventOrArt.delate');
        Route::get('dashboard/mediaUploadPage', 'MediaController@create')->name('media.show');
        Route::post('dashboard/mediaUploadPost', 'MediaController@store')->name('media.upload');
        Route::get('dashboard/mediaUpload', 'MediaController@auto_complet')->name('media.autocomplet');


        Route::get('/art/list', "Dashboard\ArtController@index")->name('admin.art.list');
        Route::get('/art/create', "Dashboard\ArtController@create")->name('admin.art.create');
        Route::get('/art/edit/{art}/', "Dashboard\ArtController@edit")->name('admin.art.edit');
        Route::get('/art/show/{art}/', "Dashboard\ArtController@show")->name('admin.art.show');
        Route::put('/art/store', "Dashboard\ArtController@store")->name('admin.art.store');
        Route::post('/art/update/{art}', "Dashboard\ArtController@udpate")->name('admin.art.update');
        Route::delete('/art/delete/{art}', "Dashboard\ArtController@delete")->name('admin.art.delete');

        Route::get('/event/list', "Dashboard\EventController@index")->name('admin.event.list');
        Route::get('/event/create', "Dashboard\EventController@create")->name('admin.event.create');
        Route::get('/event/edit/{event}/', "Dashboard\EventController@edit")->name('admin.event.edit');
        Route::get('/event/show/{event}/', "Dashboard\EventController@show")->name('admin.event.show');
        Route::put('/event/store', "Dashboard\EventController@store")->name('admin.event.store');
        Route::post('/event/update/{event}', "Dashboard\EventController@udpate")->name('admin.event.update');
        Route::delete('/event/delete/{event}', "Dashboard\EventController@delete")->name('admin.event.delete');

    });

    // Route::get('/shop/detail','ShopController@detail')->name('shop.detail');
    // Route::get('/shop/checkout','ShopController@checkout')->name('shop.checkout');
    // Route::get('/shop/add-cart-item','ShopController@addCartItem')->name('shop.add-cart-item');
    // Route::post('/shop/update-cart-item','ShopController@updateCartItem')->name('shop.update-cart-item');
    // Route::delete('/shop/remove-cart-item/{idCartItem}','ShopController@removeCartItem')->name('shop.remove-cart-item');
    // Route::post('/shop/checkout/complet','ShopController@completCheckout')->name('shop.checkout.complet');
    //completCheckout ('shop.checkout.complet')
});
Route::middleware(['auth','verified'])->group(function () {

    Route::post('/paypal/payment/create', 'PayPalController@createOrder')->name('paypal.payment.create');
    Route::get('/paypal/payment/cancel', 'PayPalController@cancel')->name('paypal.payment.cancel');
    Route::post('/paypal/payment/success', 'PayPalController@getOrder')->name('paypal.payment.success');
    Route::get('/shop/detail','ShopController@detail')->name('shop.detail');
    Route::get('/shop/checkout','ShopController@checkout')->name('shop.checkout');
    Route::post('/shop/add-cart-item','ShopController@addCartItem')->name('shop.add-cart-item');
    Route::post('/shop/update-cart-item','ShopController@updateCartItem')->name('shop.update-cart-item');
    Route::delete('/shop/remove-cart-item/{idCartItem}','ShopController@removeCartItem')->name('shop.remove-cart-item');
    Route::post('/shop/checkout/complet','ShopController@completCheckout')->name('shop.checkout.complet');
    //completCheckout ('shop.checkout.complet')
});

