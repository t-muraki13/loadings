<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LoadingController;
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
});

require __DIR__.'/auth.php';
