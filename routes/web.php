<?php

use App\Http\Controllers\Admin\AdminEventController as AdminAdminEventController;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminYearbookController;
use App\Http\Controllers\AdminEventController;
use App\Http\Controllers\LandingController;
use Illuminate\Support\Facades\Auth;
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


Route::middleware(['auth'])->group(function () {
    Route::middleware(['admin'])->group(function () {
        Route::get('/pdf/create', 'PdfController@create');
        Route::post('/pdf', 'PdfController@store');
        Route::delete('/pdf/delete/{id}', 'PdfController@destroy');

        Route::group(['prefix' => 'admin'], function() {
            Route::get('dashboard', [AdminHomeController::class, 'index']);
            
            Route::group(['prefix' => 'landing'], function() {
                Route::get('', [AdminHomeController::class, 'indexLanding'])->name('admin.landing');
            });
            Route::get('wisudawan/create', [AdminHomeController::class, 'createWisudawan'])->name('admin.create.wisudawan');
            Route::post('wisudawan', [AdminHomeController::class, 'storeWisudawan'])->name('admin.store.wisudawan');
            Route::delete('wisudawan/{id}', [AdminHomeController::class, 'deleteWisudawan'])->name('admin.delete.wisudawan');
            Route::group(['prefix' => 'yearbook'], function() {
                Route::get('', [AdminYearbookController::class, 'index'])->name('admin.yearbook.index');
                Route::get('/create', [AdminYearbookController::class, 'create'])->name('admin.yearbook.create');
                Route::post('', [AdminYearbookController::class, 'store'])->name('admin.yearbook.store');
                Route::delete('{id}', [AdminYearbookController::class, 'destroy'])->name('admin.yearbook.destroy');
            });
            
            Route::group(['prefix' => 'events'], function() {
                Route::get('', [AdminAdminEventController::class, 'index'])->name('admin.events.index');
                Route::get('/create', [AdminAdminEventController::class, 'create'])->name('admin.events.create');
                Route::post('', [AdminAdminEventController::class, 'store'])->name('admin.events.store');
                Route::delete('{id}', [AdminAdminEventController::class, 'destroy'])->name('admin.events.destroy');
            });
        });
    });

});
Route::get('/archive', 'ArchiveController@index');
Route::get('/archive/year/{month}/{year}', 'ArchiveController@showyear');
Route::get('download/pdf', 'PdfController@download');
Route::get('/yearbook', 'PdfController@index')->name('yearbook');
Route::get('/pdf/{id}', 'PdfController@show')->name('yearbook.show');
Auth::routes();
Route::get('/home', 'HomeController@index');
Route::get('/events', 'EventController@index');
Route::get('/events/{id}', 'EventController@show')->name('event.detail');
Route::get('/', [LandingController::class, 'index']);