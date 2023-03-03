<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/','MainController@pageHome');
Route::get('/incubirovanie','MainController@incubirovanie');
Route::get('/contact','MainController@contacti');
//admin panel
Route::get('/logTo','MainController@loginToTheAdminPanel');

Route::get('/sales','MainController@adminSales');
Route::get('/chat','MainController@adminChat');
Route::get('/mail','MainController@adminMail');
Route::resource('mail', MailController::class);
Route::resource('title', 'App\Http\Controllers\AdminPanel\FirstTitleTetxController');
Route::resource('text', 'App\Http\Controllers\AdminPanel\TetxController');
Route::resource('video', 'App\Http\Controllers\AdminPanel\VideoController');
Route::resource('image', 'App\Http\Controllers\AdminPanel\ImageController');

Route::resource('adminIncubirovanetext', 'App\Http\Controllers\AdminPanel\IncubirovaneTextController');
Route::resource('mailAdd', \App\Http\Controllers\AddUserController::class);

//Form
Route::middleware('auth')->group(function () {
    Route::resource('shop', \App\Http\Controllers\ShopController::class);
    Route::resource('order', \App\Http\Controllers\OrderController::class);
    Route::get('/searchOrders', '\App\Http\Controllers\OrderController@search')->name('order.search');
    Route::resource('trueOrder', \App\Http\Controllers\TrueOrderController::class);
    Route::resource('truemainOrderController', \App\Http\Controllers\TruemainOrderController::class);

    Route::middleware('checkRole')->group(function () {
        Route::get('/adminPanel', 'MainController@adminPanel');
        Route::resource('/tableusers', \App\Http\Controllers\AdminPanel\TableuaserController::class);
        Route::resource('/tableproducts', \App\Http\Controllers\ProductController::class);
        Route::get('/searchOrdersA', '\App\Http\Controllers\ProductController@search')->name('orderA.search');
        Route::prefix('admin')->group(function () {
            Route::prefix('/pageHome')->group(function () {
                Route::resource('/adminIncubirovane', 'App\Http\Controllers\AdminPanel\IncubirovaneController');


                });




            });
        });
        Route::get('/admin/pageHome/adminIncubirovanie', 'MainController@adminIncubirovane');
        Route::get('/adminContact', 'MainController@adminContact');

});


//формы
Route::post('/form', 'FormController@store')->name('form');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::middleware('auth')->group(function () {
    //users pages

    Route::middleware('checkRole')->group(function () {
        //admin pages
        Route::prefix('pageHome')->group(function () {
                Route::resource('slider', \App\Http\Controllers\AdminPanel\PageHome\SliderController::class);
                Route::resource('gallery', \App\Http\Controllers\AdminPanel\PageHome\GalleryController::class);
                Route::resource('news', \App\Http\Controllers\AdminPanel\PageHome\NewsController::class);
                Route::prefix('ocompany')->group(function () {
                    Route::get('company', "\App\Http\Controllers\AdminPanel\PageHome\CompanyController@index")->name('company.index');
                    Route::post('company/updateСoverage', "\App\Http\Controllers\AdminPanel\PageHome\CompanyController@updateСoverage")->name('company.updateСoverage');
                    Route::post('company/update', "\App\Http\Controllers\AdminPanel\PageHome\CompanyController@update")->name('company.update');
                });
                Route::resource('process', \App\Http\Controllers\AdminPanel\PageHome\ProcessController::class);
        });
    });
});
require __DIR__.'/auth.php';
