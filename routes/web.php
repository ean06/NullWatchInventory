<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\WatchModelController;
use App\Http\Controllers\WatchUnitController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\RestorationController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// BRAND ROUTE
Route::get('/brands', [BrandController::class, 'index'])->name('brands');
Route::get('/brands/create', [BrandController::class, 'create']);
Route::post('/brands/create', [BrandController::class, 'store']);
Route::get('/brands/show/{id}', [BrandController::class, 'show']);
Route::get('/brands/edit/{id}', [BrandController::class, 'edit']);
Route::put('/brands/update/{id}', [BrandController::class, 'update']);
Route::delete('/brands/delete/{id}', [BrandController::class, 'delete']);

// WATCH MODEL ROUTES
Route::get('/watch-models', [WatchModelController::class, 'index']);
Route::post('/watch-models/create', [WatchModelController::class, 'create']);
Route::get('/watch-models/find/{id}', [WatchModelController::class, 'find']);
Route::get('/watch-models/show/{id}', [WatchModelController::class, 'show']);
Route::put('/watch-models/update/{id}', [WatchModelController::class, 'update']);
Route::delete('/watch-models/delete/{id}', [WatchModelController::class, 'delete']);

// WATCH UNIT ROUTES
Route::get('/watch-units', [WatchUnitController::class, 'index']);
Route::post('/watch-units/create', [WatchUnitController::class, 'create']);
Route::get('/watch-units/find/{id}', [WatchUnitController::class, 'find']);
Route::get('/watch-units/show/{id}', [WatchUnitController::class, 'show']);
Route::put('/watch-units/update/{id}', [WatchUnitController::class, 'update']);
Route::delete('/watch-units/delete/{id}', [WatchUnitController::class, 'delete']);

// TRANSACTION ROUTES
Route::get('/transactions', [TransactionController::class, 'index']);
Route::post('/transactions/create', [TransactionController::class, 'create']);
Route::get('/transactions/find/{id}', [TransactionController::class, 'find']);
Route::get('/transactions/show/{id}', [TransactionController::class, 'show']);
Route::put('/transactions/update/{id}', [TransactionController::class, 'update']);
Route::delete('/transactions/delete/{id}', [TransactionController::class, 'delete']);

// RESTORATION ROUTES
Route::get('/restorations', [RestorationController::class, 'index']);
Route::post('/restorations/create', [RestorationController::class, 'create']);
Route::get('/restorations/find/{id}', [RestorationController::class, 'find']);
Route::get('/restorations/show/{id}', [RestorationController::class, 'show']);
Route::put('/restorations/update/{id}', [RestorationController::class, 'update']);
Route::delete('/restorations/delete/{id}', [RestorationController::class, 'delete']);

require __DIR__.'/auth.php';
