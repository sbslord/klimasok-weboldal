<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\KlimaController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckOutController;
use App\Http\Controllers\IndexController;

Route::get('/', [IndexController::class, 'index']);

Route::get('/klima', [KlimaController::class, 'index'])->name('klima.index');

Route::middleware(['auth'])->group(function () {
	Route::get('/klima/create', [KlimaController::class, 'create'])->middleware('admin');
	Route::post('/klima', [KlimaController::class, 'store']);
	
	Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
	Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');
	Route::get('/checkout/success', [CheckoutController::class, 'success'])->name('checkout.success');
	
	Route::post('/cart/add-with-install/{id}', [CartController::class, 'addWithInstall'])->name('cart.add_with_install');
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{klimaId}', [CartController::class, 'add'])->name('cart.add');
    Route::post('/cart/update/{itemId}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/remove/{itemId}', [CartController::class, 'remove'])->name('cart.remove');
	
	Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::view('/rolunk', 'about');
Route::view('/szolgaltatasok', 'szolgaltatasok');
Route::get('/kapcsolat', [ContactController::class, 'create']);
Route::post('/contact', [ContactController::class, 'store']);
//Route::view('/contact', 'contact');

/*
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
*/

require __DIR__.'/auth.php';
