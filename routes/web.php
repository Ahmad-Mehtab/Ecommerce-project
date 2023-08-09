<?php

use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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
Route::get('app/clear-cache', function () {
    // Artisan::call('clear:logs');
    Artisan::call('cache:clear', );
    Artisan::call('optimize');
    Artisan::call('route:cache');
    Artisan::call('route:clear');
    // Artisan::call('view:clear');
    Artisan::call('config:cache');
    Artisan::call('config:clear');
    // Artisan::call('queue:clear');
    return '<h1>Cache facade value cleared</h1>';
});


// these routes for user front end
Route::get('/home', [HomeController::class,'redirect']);
Route::get('/', [HomeController::class,'index'])->name('home');
// Route::get('/about', [HomeController::class,'about']);
// Route::get('/doctors', [HomeController::class,'doctors']);
// Route::get('/blog', [HomeController::class,'blog']);
// Route::get('/contact', [HomeController::class,'contact']);
// Route::get('admin/users_list', [AdminController::class, 'add_doctor']);


//admin controller
Route::controller(AdminController::class)->group(function () {
    Route::get('/admin/category', 'show_categories_record');
    Route::post('/admin/add-category', 'add_category');
    Route::get('/admin/category/{id}/edit', 'edit_category');
    Route::post('/admin/category-update/{id}', 'category_update');
});
// prdcuct controller
Route::controller(ProductController::class)->group(function () {
    Route::post('/admin/add-product', 'add_product');
    Route::get('/admin/show-product', 'show_products');
    // Route::get('/admin/category/{id}/edit', 'edit_category');
    // Route::post('/admin/category-update/{id}', 'category_update');
});

Route::controller(AdminController::class)->group(function () {
    Route::get('/admin/add-product', 'add_product');
    // Route::post('/admin/add-category', 'add_category');
    // Route::get('/admin/category/{id}/edit', 'edit_category');
    // Route::post('/admin/category-update/{id}', 'category_update');
});


Route::get('/admin/brand', App\Http\Livewire\Admin\Brand\index::class);

// Route::get('/admin/category', [AdminController::class, 'show_categories_record']);
// // post Routes
// Route::post('/admin/add-category', [AdminController::class, 'add_category']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
