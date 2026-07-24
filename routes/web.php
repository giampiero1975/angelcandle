<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendCandleController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\YourCartController;
use App\Http\Controllers\Admin\CandleController as AdminCandleController;

// Rotte pubbliche (guest)
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/candles', [
    FrontendCandleController::class,
    'index'
])->name('candles.index');

Route::get('/candles/{candle}', [
    FrontendCandleController::class,
    'show'
])->name('candles.show');

Route::get('/cart', [
    CartController::class,
    'index'
])->name('cart');

// Rotte di autenticazione
Auth::routes();

// Rotte protette (auth - cliente)
Route::middleware(['auth'])->group(function () {

    Route::get('/cart', [
        CartController::class,
        'index'
    ])->name('cart.index');

    Route::post('/cart/add/{candle}', [
        CartController::class,
        'add'
    ])->name('cart.add');
    Route::post('/cart/remove/{item}', [
        CartController::class,
        'remove'
    ])->name('cart.remove');

    Route::get('/orders', [
        OrderController::class,
        'index'
    ])->name('orders.index');
    Route::post('/orders', [
        OrderController::class,
        'store'
    ])->name('orders.store');
});

    // Rotte protette (auth - admin)
    Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
        // Rotte per la gestione delle candele (solo admin)
        Route::get('/candles', [AdminCandleController::class, 'index'])->name('admin.candles.index');
        Route::get('/candles/create', [AdminCandleController::class, 'create'])->name('admin.candles.create');
        Route::post('/candles', [AdminCandleController::class, 'store'])->name('admin.candles.store');
        Route::get('/candles/{candle}/edit', [AdminCandleController::class, 'edit'])->name('admin.candles.edit');
        Route::put('/candles/{candle}', [AdminCandleController::class, 'update'])->name('admin.candles.update');
        Route::delete('/candles/{candle}', [AdminCandleController::class, 'destroy'])->name('admin.candles.destroy');
    });
