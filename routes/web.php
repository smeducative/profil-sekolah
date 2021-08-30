<?php

use App\Http\Controllers\PostController;
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

require __DIR__ . '/auth.php';

Route::middleware(['auth'])->prefix('admin')->group(function () {

    Route::view('/', 'dashboard')->name('dashboard');

    Route::prefix('artikel')->group(function () {
        Route::get('/', [PostController::class, 'index'])->name('post.index');

        Route::get('/store', [PostController::class, 'store'])->name('post.store');
        Route::post('/create', [PostController::class, 'create'])->name('post.create');

        Route::get('/edit/{post:slug}', [PostController::class, 'edit'])->name('post.edit');
        Route::put('/update/{post:slug}', [PostController::class, 'update'])->name('post.update');

        Route::delete('/delete/{post:slug}', [PostController::class, 'delete'])->name('post.delete');
    });
});
