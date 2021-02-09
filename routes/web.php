<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Page;
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

Route::get('/', 'HomeController@homepage')->name('homepage');
Route::get('quote', 'HomeController@quote')->name('quote');
Route::post('sendquote', 'HomeController@sendquote')->name('sendquote');

Auth::routes();
Route::get('logout', function(){
    Auth::logout();
    return redirect()->route('homepage');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::fallback(function () {
    return view('errors.404');
});

foreach (Page::all() as $page) {
    Route::get($page->slug, function(){
        return view($page->slug);
    });
}

Route::prefix('/admin')->middleware(['admin'])->group(function () {
    Route::get('/', 'admin\IndexController@index')->name('admin');

    Route::prefix('/booking')->group(function() {
        Route::get('/', [App\Http\Controllers\admin\BookingController::class, 'index'])->name('booking');
        Route::post('/save', 'admin\BookingController@save')->name('booking.save');
        Route::post('/changelocation', 'admin\BookingController@changelocation')->name('booking.changelocation');
        Route::get('/view/{id}', 'admin\BookingController@view')->name('booking.view');
        Route::post('/edit/{id}', 'admin\BookingController@edit')->name('booking.edit');
        Route::get('/contactcustomer/{id}', 'admin\BookingController@contactcustomer')->name('booking.contactcustomer');
        Route::get('/contactartist/{id}', 'admin\BookingController@contactartist')->name('booking.contactartist');
        Route::post('/contact', 'admin\BookingController@sendmail')->name('booking.send');
        Route::get('/delete/{id}', 'admin\BookingController@delete')->name('booking.delete');
        Route::get('/filter1/{id}', 'admin\BookingController@filter1')->name('booking.filter1');
        Route::get('/filter2', 'admin\BookingController@filter2')->name('booking.filter2');
    });


    Route::prefix('payment')->group(function () {
        Route::get('/', [App\Http\Controllers\admin\PaymentController::class, 'index'])->name('payment');
    });

    /** CRUD Artist with main information */
    //block artist
    Route::get('artists/blockartist', 'admin\ArtistController@blockartist')->name('blockartist');
    //active artist
    Route::get('artists/activeartist', 'admin\ArtistController@activeartist')->name('activeartist');
    Route::get('artists/topArtists', 'admin\ArtistController@topArtists')->name('artists.topArtists');

    Route::resource('artists', 'admin\ArtistController');

    Route::get('profiles', 'admin\ProfileController@all')->name('allprofiles');
    Route::get('profiles/blocked', 'admin\ProfileController@pendings')->name('pendingprofiles');
    Route::get('profiles/top', 'admin\ProfileController@top')->name('topprofiles');
    Route::delete('profiles/{id}', 'admin\ProfileController@removeprofile');
    Route::post('profiles/{id}/active', 'admin\ProfileController@activeprofile');
    Route::post('profiles/{id}/block', 'admin\ProfileController@blockprofile');
    Route::post('profiles/{id}/upgrade', 'admin\ProfileController@upgradeprofile');
    Route::post('profiles/{id}/downgrade', 'admin\ProfileController@downgradeprofile');
    Route::get('profiles/create', 'admin\ProfileController@createprofile')->name('createprofile');
    Route::post('profiles/store', 'admin\ProfileController@storeprofile')->name('storeprofile');
    Route::get('profiles/{id}/changestatus', 'admin\ProfileController@changestatus');
    Route::get('profiles/{id}/booking', 'admin\ProfileController@booking')->name('profiles.booking');
    Route::get('profiles/{id}/showpayment', 'admin\ProfileController@showpayment')->name('profiles.showpayment');
    Route::post('profiles/payment-confirm', 'admin\ProfileController@paystatus')->name('payment-confirm');

    /** Artist content management */
    Route::prefix('artists/{artist}')->group(function () {
        /**Profile CRUD */
        Route::get('profiles', 'admin\ProfileController@index')->name('profiles');
        Route::get('createprofiles', 'admin\ProfileController@create')->name('profiles.create');
        Route::post('profiles/store', 'admin\ProfileController@store')->name('profiles.store');
        Route::get('profile/{profileid}', 'admin\ProfileController@edit')->name('profiles.edit');
        Route::post('profiles/{profileid}', 'admin\ProfileController@update')->name('profiles.update');
        Route::delete('profiles/{profileid}', 'admin\ProfileController@destroy')->name('profiles.destroy');
        Route::post('profiles/{profileid}/block', 'admin\ProfileController@block')->name('profiles.block');
        Route::post('profiles/{profileid}/active', 'admin\ProfileController@active')->name('profiles.active');

        Route::get('contact', 'admin\IndexController@contact')->name('contact');

        Route::prefix('profiles/{profileid}')->group(function(){

            Route::post('/changestatus', 'admin\ProfileController@changestatusprofile');

            /**Edit Video */
            Route::get('showvideo', 'admin\ProfileController@showVideo')->name('showvideo');
            Route::post('uploadvideo', 'admin\ProfileController@uploadVideo')->name('uploadvideo');
            Route::post('removevideo', 'admin\ProfileController@removevideo')->name('removevideo');
            Route::post('setvideo', 'admin\ProfileController@setvideo');

            /**Edit Image */
            Route::get('showimage', 'admin\ProfileController@showImage')->name('showimage');
            Route::post('uploadpageimage', 'admin\ProfileController@uploadPageImage')->name('uploadpageimage');
            Route::post('uploadreqimage', 'admin\ProfileController@uploadRepimage')->name('uploadrepimage');
            Route::post('uploadreviewimage', 'admin\ProfileController@uploadReviewImage')->name('uploadreviewimage');
            Route::post('uploadgalleryimage', 'admin\ProfileController@uploadGalleryImage')->name('uploadgalleryimage');
            Route::get('removegallery', 'admin\ProfileController@removeGallery');

            /**Edit Music */
            Route::get('showmusic', 'admin\ProfileController@showMusic')->name('showmusic');
            Route::post('uploadmusic', 'admin\ProfileController@uploadMusic')->name('uploadmusic');
            Route::post('removemusic', 'admin\ProfileController@removemusic')->name('removemusic');

            /**Edit Social Account */
            Route::get('social', 'admin\ProfileController@showsocial')->name('showsocial');
            Route::post('uploadsocial', 'admin\ProfileController@uploadsocial')->name('uploadsocial');

            /**Edit Pricing information */
            Route::get('showpricing', 'admin\ProfileController@showpricing')->name('showpricing');
            Route::post('addstandardinfo', 'admin\ProfileController@addstandardinfo')->name('addstandardinfo');
            Route::post('addaddonprice', 'admin\ProfileController@addaddonprice')->name('addaddonprice');
            Route::get('editaddonprice', 'admin\ProfileController@editaddonprice')->name('editaddonprice');
            Route::get('deleteaddonprice', 'admin\ProfileController@deleteaddonprice')->name('deleteaddonprice');
            Route::post('addlocationprice', 'admin\ProfileController@addlocationprice')->name('addlocationprice');
            Route::post('updatealllocation', 'admin\ProfileController@updatealllocation')->name('updatealllocation');

            Route::get('showrepertorie', 'admin\ProfileController@showrepertorie')->name('showrepertorie');
            Route::post('addrepertorie', 'admin\ProfileController@addrepertorie')->name('addrepertorie');
            Route::get('editrepertorie', 'admin\ProfileController@editrepertorie')->name('editrepertorie');
            Route::get('deleterepertorie', 'admin\ProfileController@deleterepertorie')->name('deleterepertorie');

            Route::get('detail', 'admin\ProfileController@artistsdetail')->name('artists.detail');
        });

    });


    /**Message Management */
    Route::get('email', 'admin\MessageController@index')->name('email');
    Route::get('email/compose', 'admin\MessageController@create');
    Route::get('email/{id}/reply', 'admin\MessageController@reply');
    Route::get('email/{id}/show', 'admin\MessageController@show');
    Route::get('email/sent', 'admin\MessageController@sent');
    Route::get('email/draft', 'admin\MessageController@draft');
    Route::get('email/trash', 'admin\MessageController@trash');
    Route::get('email/sendtrash', 'admin\MessageController@sendtrash');
    Route::get('email/recovertrash', 'admin\MessageController@recovertrash');
    Route::get('email/remove', 'admin\MessageController@remove');
    Route::get('email/{id}/checked', 'admin\MessageController@checked');
    Route::post('email', 'admin\MessageController@send');
    Route::post('email/save', 'admin\MessageController@save');
    Route::get('email/{id}/singletrash', 'admin\MessageController@singletrash');
    Route::get('email/{id}/singledelete', 'admin\MessageController@singledelete');
    Route::get('email/movetotrash', 'admin\MessageController@movetotrash');
    Route::get('email/recover', 'admin\MessageController@recover');
    Route::get('email/delete', 'admin\MessageController@delete');
    Route::get('email/{id}/singlerecover', 'admin\MessageController@singlerecover');


    Route::prefix('menu')->group(function(){
        Route::get('/', 'admin\MenuController@menu')->name('menu');
        Route::get('/{id}', 'admin\MenuController@menu');
        Route::get('/create', 'admin\MenuController@create');
        Route::post('/store', 'admin\MenuController@store');
        Route::delete('/{id}/destroy', 'admin\MenuController@destroy');
        Route::get('/{id}/show', 'admin\MenuController@edit');
        Route::put('/{id}', 'admin\MenuController@update');
        Route::post('/{id}/page', 'admin\MenuController@addpage');
        Route::post('/{id}/page/remove', 'admin\MenuController@removepage');
        Route::post('/{id}/sort', 'admin\MenuController@sort');

    });

    /**Envets, Locations, Setting Management */
    Route::resource('maincategories', 'admin\ParentactController');
    Route::resource('acttypes', 'admin\ActTypeController');
    Route::resource('locations', 'admin\LocationController');
    Route::resource('events', 'admin\EventController');

    /**setting */
    Route::get('setting', 'admin\IndexController@setting')->name('setting');
    Route::post('account', 'admin\IndexController@update')->name('account.update');
    Route::post('addadmin', 'admin\IndexController@addadmin')->name('admin.add');
    Route::post('removeadmin', 'admin\IndexController@removeadmin')->name('admin.remove');
    Route::get('showrole', 'admin\IndexController@showrole')->name('showrole');
    Route::post('editrole', 'admin\IndexController@editrole')->name('editrole');

    Route::prefix('calendar')->group(function() {
        Route::get('/', 'admin\CalendarController@index')->name('calendar.index');
        Route::post('/change', 'admin\CalendarController@change')->name('calendar.change');
    });

    Route::prefix('support')->group(function() {
        Route::get('/', 'admin\SupportController@index')->name('support.index');
        Route::post('/send', 'admin\SupportController@send')->name('support.send');
    });
    /**Others */
    Route::resource('blog', 'admin\BlogController');
    Route::resource('category', 'admin\CategoryController');
    Route::get('pages/{page}/changeStatus', 'admin\PageController@changeStatus')->name('pages.changeStatus');
    Route::resource('pages', 'admin\PageController');
});

Route::get('backroom/login', function(){
    return view('client.login');
});
Route::prefix('/backroom')->middleware(['client'])->group(function () {
    Route::get('/', 'client\IndexController@index')->name('client');

    Route::prefix('/profiles')->group(function(){
        Route::get('/', 'client\ProfileController@index')->name('client.profiles');
        Route::get('/create', 'client\ProfileController@create');
        Route::post('/store', 'client\ProfileController@store');
        Route::get('/{id}', 'client\ProfileController@edit')->name('client.profiles.edit');
        Route::put('/{id}', 'client\ProfileController@update');
        Route::delete('/{id}', 'client\ProfileController@destroy');

        Route::prefix('/{id}')->group(function(){
            /**Edit Video */
            Route::get('showvideo', 'client\ProfileController@showVideo')->name('client.showvideo');
            Route::post('uploadvideo', 'client\ProfileController@uploadVideo')->name('client.uploadvideo');
            Route::post('removevideo', 'client\ProfileController@removevideo')->name('client.removevideo');
            Route::post('setvideo', 'client\ProfileController@setvideo');

            /**Edit Image */
            Route::get('showimage', 'client\ProfileController@showImage')->name('client.showimage');
            Route::post('uploadpageimage', 'client\ProfileController@uploadPageImage')->name('client.uploadpageimage');
            Route::post('uploadreqimage', 'client\ProfileController@uploadRepimage')->name('client.uploadrepimage');
            Route::post('uploadreviewimage', 'client\ProfileController@uploadReviewImage')->name('client.uploadreviewimage');
            Route::post('uploadgalleryimage', 'client\ProfileController@uploadGalleryImage')->name('client.uploadgalleryimage');
            Route::get('removegallery', 'client\ProfileController@removeGallery');

            /**Edit Music */
            Route::get('showmusic', 'client\ProfileController@showMusic')->name('client.showmusic');
            Route::post('uploadmusic', 'client\ProfileController@uploadMusic')->name('client.uploadmusic');
            Route::post('removemusic', 'client\ProfileController@removemusic')->name('client.removemusic');

            /**Edit Social Account */
            Route::get('social', 'client\ProfileController@showsocial')->name('client.showsocial');
            Route::post('uploadsocial', 'client\ProfileController@uploadsocial')->name('client.uploadsocial');

            /**Edit Pricing information */
            Route::get('showpricing', 'client\ProfileController@showpricing')->name('client.showpricing');
            Route::post('addstandardinfo', 'client\ProfileController@addstandardinfo')->name('client.addstandardinfo');
            Route::post('addaddonprice', 'client\ProfileController@addaddonprice')->name('client.addaddonprice');
            Route::get('editaddonprice', 'client\ProfileController@editaddonprice')->name('client.editaddonprice');
            Route::get('deleteaddonprice', 'client\ProfileController@deleteaddonprice')->name('client.deleteaddonprice');
            Route::post('addlocationprice', 'client\ProfileController@addlocationprice')->name('client.addlocationprice');
            Route::post('updatealllocation', 'client\ProfileController@updatealllocation')->name('client.updatealllocation');

            Route::get('showrepertorie', 'client\ProfileController@showrepertorie')->name('client.showrepertorie');
            Route::post('addrepertorie', 'client\ProfileController@addrepertorie')->name('client.addrepertorie');
            Route::get('editrepertorie', 'client\ProfileController@editrepertorie')->name('client.editrepertorie');
            Route::get('deleterepertorie', 'client\ProfileController@deleterepertorie')->name('client.deleterepertorie');

            Route::get('detail', 'client\ProfileController@artistsdetail')->name('client.artists.detail');
        });
    });
    Route::prefix('/booking')->group(function() {
        Route::get('/', [App\Http\Controllers\client\BookingController::class, 'index'])->name('client.booking');
        Route::post('/save', 'client\BookingController@save')->name('client.booking.save');
        Route::get('/view/{id}', 'client\BookingController@view')->name('client.booking.view');
        Route::get('/contactcustomer/{id}', 'client\BookingController@contactcustomer')->name('client.booking.contactcustomer');
        Route::post('/contact', 'client\BookingController@sendmail')->name('client.booking.send');
        Route::get('/delete/{id}', 'client\BookingController@delete')->name('client.booking.delete');
        Route::get('/filter1/{id}', 'client\BookingController@filter1')->name('client.booking.filter1');
        Route::get('/filter2', 'client\BookingController@filter2')->name('client.booking.filter2');
    });
    Route::prefix('calendar')->group(function() {
        Route::get('/', 'client\CalendarController@index')->name('client.calendar.index');
        Route::post('/change', 'client\CalendarController@change')->name('client.calendar.change');
    });
    Route::prefix('support')->group(function() {
        Route::get('/', 'client\SupportController@index')->name('client.support.index');
        Route::post('/send', 'client\SupportController@send')->name('client.support.send');
    });
    /**Message Management */
    Route::get('email', 'client\MessageController@index')->name('client.email');
    Route::get('email/compose', 'client\MessageController@create');
    Route::get('email/{id}/reply', 'client\MessageController@reply');
    Route::get('email/{id}/show', 'client\MessageController@show');
    Route::get('email/sent', 'client\MessageController@sent');
    Route::get('email/draft', 'client\MessageController@draft');
    Route::get('email/trash', 'client\MessageController@trash');
    Route::get('email/sendtrash', 'client\MessageController@sendtrash');
    Route::get('email/recovertrash', 'client\MessageController@recovertrash');
    Route::get('email/remove', 'client\MessageController@remove');
    Route::get('email/{id}/checked', 'client\MessageController@checked');
    Route::post('email', 'client\MessageController@send');
    Route::post('email/save', 'client\MessageController@save');
    Route::get('email/{id}/singletrash', 'client\MessageController@singletrash');
    Route::get('email/{id}/singledelete', 'client\MessageController@singledelete');
    Route::get('email/movetotrash', 'client\MessageController@movetotrash');
    Route::get('email/recover', 'client\MessageController@recover');
    Route::get('email/delete', 'client\MessageController@delete');
    Route::get('email/{id}/singlerecover', 'client\MessageController@singlerecover');

});

