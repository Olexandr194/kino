<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Main'], function (){
    Route::get('/', [App\Http\Controllers\Main\MainPageController::class, 'index'])->name('main.main_page');
    Route::get('/poster', [App\Http\Controllers\Main\PostersController::class, 'poster'])->name('main.poster');
    Route::get('/soon', [App\Http\Controllers\Main\SoonController::class, 'soon'])->name('main.soon');
    Route::get('/movie/{movie}', [App\Http\Controllers\Main\MovieController::class, 'movie'])->name('main.movie');
    Route::get('/movie/{movie}/schedules_search', [App\Http\Controllers\Main\MovieController::class, 'schedules_search'])->name('main.movie.schedules_search');
    Route::get('/schedule', [App\Http\Controllers\Main\SchedulesController::class, 'schedule'])->name('main.schedule');
    Route::get('/schedule/cinema_halls_search', [App\Http\Controllers\Main\SchedulesController::class, 'cinema_halls_search'])->name('main.schedule.cinema_halls_search');
    Route::get('/schedule/filter', [App\Http\Controllers\Main\SchedulesController::class, 'filter'])->name('main.schedule.filter');
    Route::get('/booking/{schedule}', [App\Http\Controllers\Main\BookingController::class, 'index'])->name('main.schedule.booking');
    Route::get('/book', [App\Http\Controllers\Main\BookingController::class, 'book'])->name('main.schedule.book');
    Route::get('/cinemas', [App\Http\Controllers\Main\CinemasController::class, 'index'])->name('main.cinemas.index');
    Route::get('/cinema/{cinema_name}', [App\Http\Controllers\Main\CinemasController::class, 'single_cinema'])->name('main.cinemas.single_cinema');
    Route::get('/cinema_hall/{cinema_hall}', [App\Http\Controllers\Main\CinemasController::class, 'cinema_hall'])->name('main.cinemas.cinema_hall');
    Route::get('/actions', [App\Http\Controllers\Main\ActionController::class, 'index'])->name('main.actions.index');
    Route::get('/actions/{action}', [App\Http\Controllers\Main\ActionController::class, 'single_action'])->name('main.actions.single_action');
    Route::get('/pages/{page}', [App\Http\Controllers\Main\PagesController::class, 'pages'])->name('main.pages.index');
    Route::get('/contact_page/', [App\Http\Controllers\Main\PagesController::class, 'contact_page'])->name('main.pages.contact_page');
    Route::get('/news', [App\Http\Controllers\Main\NewsController::class, 'index'])->name('main.news.index');
    Route::get('/news/{news}', [App\Http\Controllers\Main\NewsController::class, 'single_news'])->name('main.news.single_news');
});

Route::group(['namespace' => 'Personal'], function (){
    Route::get('/personal', [App\Http\Controllers\Main\PersonalController::class, 'index'])->name('personal.index');
    Route::patch('/personal/{personal}', [App\Http\Controllers\Main\PersonalController::class, 'update'])->name('personal.update');
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth', 'admin']], function (){
    Route::get('/', [App\Http\Controllers\Admin\IndexController::class, '__invoke'])->name('admin.main');

    Route::group(['namespace' => 'Cinema', 'prefix' => 'cinemas'], function (){
        Route::get('/', [App\Http\Controllers\Admin\CinemasController::class, 'index'])->name('admin.cinemas.index');
        Route::get('/create', [App\Http\Controllers\Admin\CinemasController::class, 'create'])->name('admin.cinemas.create');
        Route::post('/', [App\Http\Controllers\Admin\CinemasController::class, 'store'])->name('admin.cinemas.store');
        Route::post('/hall_delete', [App\Http\Controllers\Admin\CinemasController::class, 'destroy_hall'])->name('admin.cinemas.destroy_hall');
        Route::get('/{cinema}', [App\Http\Controllers\Admin\CinemasController::class, 'show'])->name('admin.cinemas.show');
        Route::patch('/update{cinema}', [App\Http\Controllers\Admin\CinemasController::class, 'update'])->name('admin.cinemas.update');
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
        Route::post('/movie_image_delete', [App\Http\Controllers\Admin\MoviesController::class, 'destroy_image'])->name('admin.movies.destroy_image');
    });

    Route::group(['namespace' => 'News', 'prefix' => 'news'], function (){
        Route::get('/', [App\Http\Controllers\Admin\NewsController::class, 'index'])->name('admin.news.index');
        Route::get('/create', [App\Http\Controllers\Admin\NewsController::class, 'create'])->name('admin.news.create');
        Route::post('/', [App\Http\Controllers\Admin\NewsController::class, 'store'])->name('admin.news.store');
        Route::get('/{news}/edit', [App\Http\Controllers\Admin\NewsController::class, 'edit'])->name('admin.news.edit');
        Route::patch('/{news}', [App\Http\Controllers\Admin\NewsController::class, 'update'])->name('admin.news.update');
        Route::post('/news_delete', [App\Http\Controllers\Admin\NewsController::class, 'destroy_news'])->name('admin.news.destroy_news');
        Route::post('/news_image_delete', [App\Http\Controllers\Admin\NewsController::class, 'destroy_image'])->name('admin.news.destroy_image');
    });

    Route::group(['namespace' => 'Actions', 'prefix' => 'actions'], function (){
        Route::get('/', [App\Http\Controllers\Admin\ActionsController::class, 'index'])->name('admin.actions.index');
        Route::get('/create', [App\Http\Controllers\Admin\ActionsController::class, 'create'])->name('admin.actions.create');
        Route::post('/', [App\Http\Controllers\Admin\ActionsController::class, 'store'])->name('admin.actions.store');
        Route::get('/{action}/edit', [App\Http\Controllers\Admin\ActionsController::class, 'edit'])->name('admin.actions.edit');
        Route::patch('/{action}', [App\Http\Controllers\Admin\ActionsController::class, 'update'])->name('admin.actions.update');
        Route::post('/action_delete', [App\Http\Controllers\Admin\ActionsController::class, 'destroy_action'])->name('admin.actions.destroy_action');
        Route::post('/action_image_delete', [App\Http\Controllers\Admin\ActionsController::class, 'destroy_image'])->name('admin.actions.destroy_image');
    });

    Route::group(['namespace' => 'Pages', 'prefix' => 'pages'], function (){
        Route::get('/', [App\Http\Controllers\Admin\PagesController::class, 'index'])->name('admin.pages.index');
        Route::get('/create', [App\Http\Controllers\Admin\PagesController::class, 'create'])->name('admin.pages.create');
        Route::post('/', [App\Http\Controllers\Admin\PagesController::class, 'store'])->name('admin.pages.store');
        Route::get('/main_page/edit', [App\Http\Controllers\Admin\PagesController::class, 'main_page_edit'])->name('admin.pages.main_page_edit');
        Route::patch('/main_page', [App\Http\Controllers\Admin\PagesController::class, 'main_page_update'])->name('admin.pages.main_page_update');
        Route::get('/{page}/edit', [App\Http\Controllers\Admin\PagesController::class, 'edit'])->name('admin.pages.edit');
        Route::patch('/{page}', [App\Http\Controllers\Admin\PagesController::class, 'update'])->name('admin.pages.update');
        Route::get('/contact_page', [App\Http\Controllers\Admin\PagesController::class, 'contact_page_index'])->name('admin.pages.contact_page_index');
        Route::get('/contact_page/create', [App\Http\Controllers\Admin\PagesController::class, 'contact_page_create'])->name('admin.pages.contact_page_create');
        Route::post('/contact_page/', [App\Http\Controllers\Admin\PagesController::class, 'contact_page_store'])->name('admin.pages.contact_page_store');
        Route::get('/contact_page/{contact_page}/edit', [App\Http\Controllers\Admin\PagesController::class, 'contact_page_edit'])->name('admin.pages.contact_page_edit');
        Route::patch('/contact_page/{contact_page}', [App\Http\Controllers\Admin\PagesController::class, 'contact_page_update'])->name('admin.pages.contact_page_update');
        Route::post('/contact_page/delete', [App\Http\Controllers\Admin\PagesController::class, 'destroy_contact_page'])->name('admin.pages.destroy_contact_page');
        Route::post('/page/delete', [App\Http\Controllers\Admin\PagesController::class, 'destroy_page'])->name('admin.pages.destroy');
        Route::post('/page_image_delete', [App\Http\Controllers\Admin\PagesController::class, 'destroy_image'])->name('admin.pages.destroy_image');
    });

    Route::group(['namespace' => 'Banners', 'prefix' => 'banners'], function (){
        Route::get('/', [App\Http\Controllers\Admin\BannersController::class, 'index'])->name('admin.banners.index');
        Route::patch('/', [App\Http\Controllers\Admin\BannersController::class, 'top_update'])->name('admin.banners.top_update');
        Route::post('/banner/delete', [App\Http\Controllers\Admin\BannersController::class, 'destroy_top_banner'])->name('admin.banners.destroy_top_banner');
        Route::patch('/bottom', [App\Http\Controllers\Admin\BannersController::class, 'bottom_update'])->name('admin.banners.bottom_update');
        Route::post('/bottom/delete', [App\Http\Controllers\Admin\BannersController::class, 'destroy_bottom_banner'])->name('admin.banners.destroy_bottom_banner');
        Route::patch('/main', [App\Http\Controllers\Admin\BannersController::class, 'main_update'])->name('admin.banners.main_update');
    });

    Route::group(['namespace' => 'Users', 'prefix' => 'users'], function (){
        Route::get('/', [App\Http\Controllers\Admin\UsersController::class, 'index'])->name('admin.users.index');
        Route::get('/search', [App\Http\Controllers\Admin\UsersController::class, 'search'])->name('admin.users.search');
        Route::get('/{users}/edit', [App\Http\Controllers\Admin\UsersController::class, 'edit'])->name('admin.users.edit');
        Route::patch('/{users}', [App\Http\Controllers\Admin\UsersController::class, 'update'])->name('admin.users.update');
        Route::post('/user/delete', [App\Http\Controllers\Admin\UsersController::class, 'destroy_user'])->name('admin.users.destroy_user');
    });

    Route::group(['namespace' => 'Schedules', 'prefix' => 'schedules'], function (){
        Route::get('/', [App\Http\Controllers\Admin\ScheduleController::class, 'index'])->name('admin.schedules.index');
        Route::get('/create', [App\Http\Controllers\Admin\ScheduleController::class, 'create'])->name('admin.schedules.create');
        Route::get('/search', [App\Http\Controllers\Admin\ScheduleController::class, 'cinema_search'])->name('admin.schedules.cinema_search');
        Route::post('/', [App\Http\Controllers\Admin\ScheduleController::class, 'store'])->name('admin.schedules.store');
        Route::get('/index_search', [App\Http\Controllers\Admin\ScheduleController::class, 'index_search'])->name('admin.schedules.index_search');
        Route::get('/hall_search', [App\Http\Controllers\Admin\ScheduleController::class, 'hall_search'])->name('admin.schedules.hall_search');
        Route::get('/date_search', [App\Http\Controllers\Admin\ScheduleController::class, 'date_search'])->name('admin.schedules.date_search');
        Route::get('/{schedule}/edit', [App\Http\Controllers\Admin\ScheduleController::class, 'edit'])->name('admin.schedules.edit');
        Route::patch('/{schedule}', [App\Http\Controllers\Admin\ScheduleController::class, 'update'])->name('admin.schedules.update');
        Route::post('/schedule/delete', [App\Http\Controllers\Admin\ScheduleController::class, 'destroy'])->name('admin.schedules.destroy');
    });

    Route::group(['namespace' => 'Mailing_list', 'prefix' => 'mailing_list'], function (){
        Route::get('/', [App\Http\Controllers\Admin\MailingListController::class, 'index'])->name('admin.mailing_list.index');
        Route::post('/save_html', [App\Http\Controllers\Admin\MailingListController::class, 'save_html'])->name('admin.mailing_list.save_html');
        Route::post('/delete_html', [App\Http\Controllers\Admin\MailingListController::class, 'delete_html'])->name('admin.mailing_list.delete_html');
        Route::get('/reload', [App\Http\Controllers\Admin\MailingListController::class, 'reload'])->name('admin.mailing_list.reload');
        Route::get('/select_users', [App\Http\Controllers\Admin\MailingListController::class, 'select_users'])->name('admin.mailing_list.select_users');
        Route::get('/checked_users', [App\Http\Controllers\Admin\MailingListController::class, 'checked_users'])->name('admin.mailing_list.checked_users');
        Route::get('/search_users', [App\Http\Controllers\Admin\MailingListController::class, 'search_users'])->name('admin.mailing_list.search_users');
        Route::post('/send', [App\Http\Controllers\Admin\MailingListController::class, 'send'])->name('admin.mailing_list.send');
    });

});


    Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout']);


\Illuminate\Support\Facades\Auth::routes();

