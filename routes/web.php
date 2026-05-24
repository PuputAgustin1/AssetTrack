<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AssetController;

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

    Route::get('/assets/check-code/{code}', [AssetController::class, 'checkCode'])
        ->name('assets.checkCode');

    Route::resource('assets', AssetController::class);

    Route::get('/scan', function () {
    return view('scan');})->name('scan');

    // Halaman Export & Import
    Route::get('/assets-export', [AssetController::class, 'exportPage'])
        ->name('assets.export.page');

    Route::get('/assets-import', [AssetController::class, 'importPage'])
        ->name('assets.import.page');

    // Proses Export & Import
    Route::get('/export-assets', [AssetController::class, 'export'])
        ->name('assets.export');

    Route::post('/assets/import', [AssetController::class, 'import'])
        ->name('assets.import');

    // Download Template Excel
    Route::get('/assets-template', [AssetController::class, 'template'])
        ->name('assets.template');
});
require __DIR__.'/auth.php';


