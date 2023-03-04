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
                Route::prefix('aboutСompany')->group(function () {
                    Route::get('company', "\App\Http\Controllers\AdminPanel\PageHome\CompanyController@index")->name('company.index');
                    Route::post('company/updateСoverage', "\App\Http\Controllers\AdminPanel\PageHome\CompanyController@updateСoverage")->name('company.updateСoverage');
                    Route::post('company/update', "\App\Http\Controllers\AdminPanel\PageHome\CompanyController@update")->name('company.update');
                });
                Route::resource('process', \App\Http\Controllers\AdminPanel\PageHome\ProcessController::class);
                Route::prefix('textPageHome')->group(function () {
                    Route::get('text', [App\Http\Controllers\AdminPanel\PageHome\TextPageHomeController::class, 'index'])->name('text.index' );
                    Route::match(['get', 'post'],'createNewText', [App\Http\Controllers\AdminPanel\PageHome\TextPageHomeController::class, 'createNewText'])->name('text.createNewText');
                    Route::post('updateTitle', [App\Http\Controllers\AdminPanel\PageHome\TextPageHomeController::class, 'updateTitle'])->name('text.updateTitle');
                    Route::match(['get', 'post'],'updateText/{id}', [App\Http\Controllers\AdminPanel\PageHome\TextPageHomeController::class,'updateText'])->name('text.updateText');
                    Route::match(['get', 'post'],'deleteText/{id}',[App\Http\Controllers\AdminPanel\PageHome\TextPageHomeController::class,'deleteText'])->name('text.deleteText');
                    Route::get('deleteTitle',[App\Http\Controllers\AdminPanel\PageHome\TextPageHomeController::class,'deleteTitle'])->name('text.deleteTitle');
                });
                Route::resource('video', App\Http\Controllers\AdminPanel\PageHome\VideoController::class);
        });
    });
});
require __DIR__.'/auth.php';
