<?php

use App\Http\Controllers\Backend\SettingsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|*/

//Route::get('/', function () {
//    return view('welcome');
//});

Route::namespace('Frontend')->group(function () {

    Route::get('/', [\App\Http\Controllers\Frontend\DefaultController::class, 'index'])->name('home.Index');

//Blog
    Route::get('/blog', [\App\Http\Controllers\Frontend\BlogController::class, 'index'])->name('blog.Index');
    Route::get('/blog/{slug}', [\App\Http\Controllers\Frontend\BlogController::class, 'detail'])->name('blog.Detail');

//Page
    Route::get('/page/{slug}', [\App\Http\Controllers\Frontend\PageController::class, 'detail'])->name('page.Detail');

//Projects
    Route::get('/project', [\App\Http\Controllers\Frontend\ProjectController::class, 'index'])->name('project.Index');
    Route::get('/project/{slug}', [\App\Http\Controllers\Frontend\ProjectController::class, 'detail'])->name('project.Detail');

//About
    Route::get('/about', [\App\Http\Controllers\Frontend\DefaultController::class, 'about'])->name('about.Detail');

//Contact
    Route::get('/contact', [\App\Http\Controllers\Frontend\DefaultController::class, 'contact'])->name('contact.Detail');
    Route::post('/contact', [\App\Http\Controllers\Frontend\DefaultController::class, 'sendMail']);

});

Route::namespace('Backend')->group(function () { //?

    Route::prefix('nedmin')->group(function () {

        Route::get('/dashboard', [\App\Http\Controllers\Backend\DefaultController::class, 'index'])->name('nedmin.Index')->middleware('admin');
        Route::get('/', [\App\Http\Controllers\Backend\DefaultController::class, 'login'])->name('nedmin.Login')->middleware('CheckLogin');
        Route::get('/logout', [\App\Http\Controllers\Backend\DefaultController::class, 'logout'])->name('nedmin.Logout');
        Route::post('/login', [\App\Http\Controllers\Backend\DefaultController::class, 'authenticate'])->name('nedmin.Authenticate');

    });

        Route::prefix('nedmin/settings')->group(function () {

            Route::get('/', [SettingsController::class, 'index'])->name('settings.Index')->middleware('admin','userRole');
            Route::post('', [SettingsController::class, 'sortable'])->name('settings.Sortable')->middleware('admin','userRole');
            Route::get('/delete/{id}', [SettingsController::class, 'destroy'])->middleware('admin','userRole');
            Route::get('/edit/{id}', [SettingsController::class, 'edit'])->name('settings.Edit')->middleware('admin','userRole');
            Route::post('/{id}', [SettingsController::class, 'update'])->name('settings.Update')->middleware('admin','userRole');

        });
});

Route::namespace('Backend')->group(function () {
    Route::prefix('nedmin')->group(function () {

        Route::middleware('admin')->group(function () {

            //BLOG MODÜLÜ
            Route::post('/blog/sortable', [BlogController::class, 'sortable'])->name('blog.Sortable');
            Route::resource('blog', BlogController::class);

            //PROJECT MODÜLÜ
            Route::post('/project/sortable', [ProjectController::class, 'sortable'])->name('project.Sortable');
            Route::resource('project', ProjectController::class);

            //PAGE MODÜLÜ
            Route::post('/page/sortable', [PageController::class, 'sortable'])->name('page.Sortable');
            Route::resource('page', PageController::class);

            //SLIDER MODÜLÜ
            Route::post('/slider/sortable', [SliderController::class, 'sortable'])->name('slider.Sortable');
            Route::resource('slider', SliderController::class);

            //ADMIN MODÜLÜ
            Route::post('/user/sortable', [UserController::class, 'sortable'])->name('user.Sortable')->middleware('userRole');
            Route::resource('user',UserController::class);
            Route::resource('user',UserController::class, ['except' => ['update','edit','store']])->middleware('userRole');

        });
    });
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
