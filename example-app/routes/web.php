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


//формы
//Route::post('/form', 'FormController@store')->name('form');
//
//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');
//
//Route::middleware('auth')->group(function () {
//
//});



Route::middleware('auth')->group(function () {
    //users pages

    Route::resource('shop', \App\Http\Controllers\Shop\ShopController::class);
    Route::resource('order', \App\Http\Controllers\Shop\OrderController::class);
    Route::get('/searchOrders', [\App\Http\Controllers\Shop\OrderController::class, 'search'])->name('order.search');
    Route::resource('trueOrder', \App\Http\Controllers\Shop\TrueOrderController::class);


    Route::middleware('checkRole')->group(function () {
        //admin pages
        Route::get('analytics', [App\Http\Controllers\AdminPanel\AnaliticsController::class, 'index'])->name('analytics.index');
        Route::get('sales', [App\Http\Controllers\AdminPanel\SalesController::class, 'index'])->name('sales.index');
        Route::get('chat', [App\Http\Controllers\AdminPanel\ChatController::class, 'index'])->name('chat.index');
        Route::resource('mail', \App\Http\Controllers\AdminPanel\MailController::class);
        Route::resource('addUser', \App\Http\Controllers\AdminPanel\AddUserController::class);
        Route::resource('tableusers', \App\Http\Controllers\AdminPanel\TableuaserController::class);
        Route::resource('/tableproducts', \App\Http\Controllers\AdminPanel\ProductController::class);
        Route::get('/searchOrdersA', [\App\Http\Controllers\AdminPanel\ProductController::class,'search'])->name('orderA.search');
        Route::prefix('deliveredOrders')->group(function () {
            Route::get('index', [\App\Http\Controllers\AdminPanel\TruemainOrderController::class, 'index'])->name('deliveredOrders.index');
            Route::get('search', [\App\Http\Controllers\AdminPanel\TruemainOrderController::class, 'search'])->name('deliveredOrders.search');
        });
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
                Route::resource('image', App\Http\Controllers\AdminPanel\PageHome\ImageController::class);
        });
        Route::prefix('pageIncubirovanie')->group(function () {
            Route::resource('header', App\Http\Controllers\AdminPanel\PageIncubirovanie\HaderController::class);
            Route::prefix('textIncubirovanie')->group(function () {
                Route::get('textI', [App\Http\Controllers\AdminPanel\PageIncubirovanie\TextController::class, 'index'])->name('textI.index' );
                Route::match(['get', 'post'],'createNewText', [App\Http\Controllers\AdminPanel\PageIncubirovanie\TextController::class, 'createNewText'])->name('textI.createNewText');
                Route::post('updateTitle', [App\Http\Controllers\AdminPanel\PageIncubirovanie\TextController::class, 'updateTitle'])->name('textI.updateTitle');
                Route::match(['get', 'post'],'updateText/{id}', [App\Http\Controllers\AdminPanel\PageIncubirovanie\TextController::class,'updateText'])->name('textI.updateText');
                Route::match(['get', 'post'],'deleteText/{id}',[App\Http\Controllers\AdminPanel\PageIncubirovanie\TextController::class,'deleteText'])->name('textI.deleteText');
                Route::get('deleteTitle',[App\Http\Controllers\AdminPanel\PageIncubirovanie\TextController::class,'deleteTitle'])->name('textI.deleteTitle');
            });
        });

    });
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__.'/auth.php';
