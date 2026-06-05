<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\AssetTransactionController;

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

    Route::get('/assets/{code}/transaction', [AssetTransactionController::class, 'create'])
    ->name('transactions.create');

    Route::post('/assets/{code}/transaction', [AssetTransactionController::class, 'store'])
        ->name('transactions.store');

    Route::post('/transactions/batch-store', [AssetTransactionController::class, 'batchStore'])
    ->name('transactions.batchStore');

    Route::get('/transactions/history', [AssetTransactionController::class, 'history'])
        ->name('transactions.history');

    Route::get('/transactions/recap', [AssetTransactionController::class, 'stockRecap'])
    ->name('transactions.stockRecap');

    Route::get('/transactions/report', [AssetTransactionController::class, 'stockReport'])
    ->name('transactions.report');

    Route::get('/transactions/report/export', [AssetTransactionController::class, 'exportStockReport'])
        ->name('transactions.report.export');

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
    
    Route::get('/scan-batches/{id}', [AssetTransactionController::class, 'showBatch'])
    ->name('scan-batches.show');

    Route::get('/scan-batches/{id}/export', [AssetTransactionController::class, 'exportBatch'])
    ->name('scan-batches.export');

    Route::get('/scan-batches/{id}/print-qr', [AssetTransactionController::class, 'printQrBatch'])
    ->name('scan-batches.printQr');
});
require __DIR__.'/auth.php';


