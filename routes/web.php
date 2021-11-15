<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::group(['prefix' => 'account'], function () {
        Route::get('/', [\App\Http\Controllers\AccountController::class, 'index'])->name('account');
        Route::get('/create', [\App\Http\Controllers\AccountController::class, 'create'])->name('account.create');
        Route::post('/store', [\App\Http\Controllers\AccountController::class, 'store'])->name('account.store');
        Route::get('/edit/{id}', [\App\Http\Controllers\AccountController::class, 'edit'])->name('account.edit');
        Route::post('/update/{id}', [\App\Http\Controllers\AccountController::class, 'update'])->name('account.update');
        Route::get('/destroy/{id}', [\App\Http\Controllers\AccountController::class, 'destroy'])->name('account.destroy');
    });

    Route::group(['prefix' => 'transaction'], function () {
        Route::get('/', [\App\Http\Controllers\TransactionController::class, 'index'])->name('transaction');
        Route::get('/create', [\App\Http\Controllers\TransactionController::class, 'create'])->name('transaction.create');
        Route::post('/store', [\App\Http\Controllers\TransactionController::class, 'store'])->name('transaction.store');
        Route::get('/edit/{id}', [\App\Http\Controllers\TransactionController::class, 'edit'])->name('transaction.edit');
        Route::post('/update/{id}', [\App\Http\Controllers\TransactionController::class, 'update'])->name('transaction.update');
        Route::get('/destroy/{id}', [\App\Http\Controllers\TransactionController::class, 'destroy'])->name('transaction.destroy');
    });
});

require __DIR__.'/auth.php';
