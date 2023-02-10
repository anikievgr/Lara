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
Route::resource('ocompany', 'App\Http\Controllers\AdminPanel\StatisticController');
Route::resource('company', 'App\Http\Controllers\AdminPanel\CompanyController');
Route::resource('process', 'App\Http\Controllers\AdminPanel\ProcessController');
Route::resource('title', 'App\Http\Controllers\AdminPanel\FirstTitleTetxController');
Route::resource('text', 'App\Http\Controllers\AdminPanel\TetxController');
Route::resource('video', 'App\Http\Controllers\AdminPanel\VideoController');
Route::resource('image', 'App\Http\Controllers\AdminPanel\ImageController');
Route::resource('adminIncubirovane', 'App\Http\Controllers\AdminPanel\IncubirovaneController');
Route::resource('adminIncubirovanetext', 'App\Http\Controllers\AdminPanel\IncubirovaneTextController');
Route::resource('mailAdd', \App\Http\Controllers\AddUserController::class);

//Form
Route::middleware('auth')->group(function () {
    Route::resource('shop', \App\Http\Controllers\ShopController::class);
    Route::get('/adminPanel','MainController@adminPanel');
Route::prefix('admin')->group(function () {
    Route::prefix('/pageHome')->group(function () {
        Route::get('/openAdminSlider', 'App\Http\Controllers\AdminPanel\SliderController@slider')->name('adminSlider');
        Route::prefix('adminSlider')->group(function () {
            Route::get('bd/delete{id}', 'App\Http\Controllers\AdminPanel\SliderController@delete')->name('bd.delete');
            Route::resource('bd', 'App\Http\Controllers\AdminPanel\SliderController')->except([
                'create', 'show', 'edit','destroy'
            ]);


        });

        Route::get('/openAdminGalerea', 'App\Http\Controllers\AdminPanel\GalleryController@gallery');
        Route::get('adminGalleryGroup/delete{id}', 'App\Http\Controllers\AdminPanel\GalleryController@deleteCategory')->name('adminGalleryGroup.deleteCategory');
        Route::prefix('adminGalleryGroup')->group(function () {
            Route::resource('adminGalerea', 'App\Http\Controllers\AdminPanel\GalleryController')->except([
                'create', 'edit','destroy'
            ]);
        });
        Route::get('/openAdminNews', 'App\Http\Controllers\AdminPanel\NewsController@news');
        Route::get('/openAdminNews/updatePages{id}', 'App\Http\Controllers\AdminPanel\NewsController@updatePages')->name('NewsController.updatePages');
        Route::prefix('openAdminNewsGroup')->group(function () {
            Route::resource('openAdminNewsGroup', 'App\Http\Controllers\AdminPanel\NewsController')->except([
                'create', 'edit'
            ]);
        });

    });
});
});
Route::get('/adminIncubirovanie', 'MainController@adminIncubirovane');
Route::get('/adminContact', 'MainController@adminContact');
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

require __DIR__.'/auth.php';
