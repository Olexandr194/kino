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

    Route::group(['namespace' => 'Movies', 'prefix' => 'movies'], function (){
        Route::get('/', [App\Http\Controllers\Admin\MoviesController::class, 'index'])->name('admin.movies.index');
        Route::get('/create', [App\Http\Controllers\Admin\MoviesController::class, 'create'])->name('admin.movies.create');
        Route::post('/', [App\Http\Controllers\Admin\MoviesController::class, 'store'])->name('admin.movies.store');
        Route::get('/{movie}/edit', [App\Http\Controllers\Admin\MoviesController::class, 'edit'])->name('admin.movies.edit');
        Route::patch('/{movie}', [App\Http\Controllers\Admin\MoviesController::class, 'update'])->name('admin.movies.update');
        Route::post('/movie_delete', [App\Http\Controllers\Admin\MoviesController::class, 'destroy_movie'])->name('admin.movies.destroy_movie');
    });

});


\Illuminate\Support\Facades\Auth::routes();

