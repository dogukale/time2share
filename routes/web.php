<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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

/*
|--------------------------------------------------------------------------
| Clear Cache
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])->group(function() {
    Route::get('/clear-cache', function() {
        Artisan::call('cache:clear');
        Artisan::call('route:clear');
        Artisan::call('config:clear');
        Artisan::call('view:clear');
        Artisan::call('optimize:clear');
        return redirect('/');
    });
});

/*
|--------------------------------------------------------------------------
| Laravel Breeze
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

/*
|--------------------------------------------------------------------------
| Authentication Middleware
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/products', [ProductController::class, 'index'])->name('products');
Route::get('/products/{id}', [ProductController::class, 'show']);

Route::get('/category', [ProductController::class, 'categories'])->name('categories');
Route::get('/products/filter/{category}', [ProductController::class, 'category']);

Route::middleware(['block', 'auth'])->group(function() {
    Route::get('/my-products', [ProductController::class, 'ownedProducts'])->name('profile');
    Route::get('/my-products/create', [ProductController::class, 'create'])->name('create');
    Route::post('/my-products/created', [ProductController::class, 'store']);

    Route::get('/loaned', [ProductController::class, 'loanedProducts'])->name('loaned');
    Route::get('/loaning/{id}', [ProductController::class, 'loaning'])->name('loaning');
    Route::get('/loaned/return/{id}', [ProductController::class, 'returnProduct']);
    Route::get('/loaned/accepted/{id}', [ProductController::class, 'returnAccepted']);

    Route::get('/profile/{id}', [ProductController::class, 'userProfile']);
    Route::get('/profile/{id}/review', [ProductController::class, 'userReview']);
    Route::post('/profile/{id}/reviewed', [ProductController::class, 'userReviewed']);
});

Route::middleware(['auth', 'admin'])->group(function() {
    Route::get('/all/loaned', [ProductController::class, 'loanedAll']);
    Route::get('/all/loaned/delete/{id}', [ProductController::class, 'loanedDelete']);
    Route::get('/all/users', [ProductController::class, 'usersAll']);
    Route::get('/all/users/disable/{id}', [ProductController::class, 'usersDisable']);
});