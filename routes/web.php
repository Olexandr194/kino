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
        Route::post('/hall_delete', [App\Http\Controllers\Admin\CinemasController::class, 'destroy_hall'])->name('admin.cinemas.destroy_hall');
        Route::get('/{cinema}', [App\Http\Controllers\Admin\CinemasController::class, 'show'])->name('admin.cinemas.show');
        Route::post('/cinema_delete', [App\Http\Controllers\Admin\CinemasController::class, 'destroy_cinema'])->name('admin.cinemas.destroy_cinema');

    });
    Route::group(['namespace' => 'CinemaHalls', 'prefix' => 'cinema_halls'], function (){
        Route::get('/create', [App\Http\Controllers\Admin\CinemaHallsController::class, 'create'])->name('admin.cinema_halls.create');
        Route::post('/', [App\Http\Controllers\Admin\CinemaHallsController::class, 'store'])->name('admin.cinema_halls.store');
        Route::get('/{cinema_hall}/edit', [App\Http\Controllers\Admin\CinemaHallsController::class, 'edit'])->name('admin.cinema_halls.edit');
        Route::patch('/{cinema_hall}', [App\Http\Controllers\Admin\CinemaHallsController::class, 'update'])->name('admin.cinema_halls.update');


    });

});


\Illuminate\Support\Facades\Auth::routes();

