<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Main'], function (){
    Route::get('/', function () { return view('welcome');});
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function (){
    Route::get('/', [App\Http\Controllers\Admin\IndexController::class, '__invoke'])->name('admin.main');

    Route::group(['namespace' => 'Cinema', 'prefix' => 'cinemas'], function (){
        Route::get('/', [App\Http\Controllers\Admin\CinemasController::class, 'index'])->name('admin.cinemas.index');
        Route::get('/create', [App\Http\Controllers\Admin\CinemasController::class, 'create'])->name('admin.cinemas.create');
        Route::post('/', [App\Http\Controllers\Admin\CinemasController::class, 'store'])->name('admin.cinemas.store');

    });
    Route::group(['namespace' => 'Cinema', 'prefix' => 'cinema_halls'], function (){
        Route::get('/', [App\Http\Controllers\Admin\CinemaHallsController::class, 'index'])->name('admin.cinema_halls.index');

    });

});


\Illuminate\Support\Facades\Auth::routes();

