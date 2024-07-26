<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LoadingController;
use App\Http\Controllers\SalesController;
use App\Models\Sales;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

// Route::get('/dashboard', function () {
//     Route::get('')
//     return view('top');
// })->middleware(['auth', 'verified'])->name('top');


Route::middleware('auth')->group(function () {
    Route::get('/top', [LoadingController::class,'index'])->name('index');
    Route::get('/create', [LoadingController::class,'create'])->name('create');
    Route::post('/store', [LoadingController::class,'store'])->name('store');
    Route::get('/edit/{id}', [LoadingController::class,'edit'])->name('edit');
    Route::post('/confirm/{id}', [LoadingController::class,'confirm'])->name('confirm');
    Route::put('/update/{id}', [LoadingController::class,'update'])->name('update');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/sales/index', [SalesController::class,'index'])->name('sales.index');
    Route::get('/sales/create', [SalesController::class,'create'])->name('sales.create');
    Route::post('/sales/store', [SalesController::class,'store'])->name('sales.store');
    Route::get('/sales/edit/{id}', [SalesController::class,'edit'])->name('sales.edit');
    Route::post('/sales/confirm/{id}', [SalesController::class,'confirm'])->name('sales.confirm');
    Route::put('/sales/update/{id}', [SalesController::class,'update'])->name('sales.update');
});

require __DIR__.'/auth.php';
