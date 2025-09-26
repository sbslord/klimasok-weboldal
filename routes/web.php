<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Models\Klima;

Route::get('/', function () {
    return view('index', [
		'klimak' => Klima::with('brand')->latest()->simplePaginate(6)
	]);
});
Route::view('/rolunk', 'about');
Route::view('/szolgaltatasok', 'szolgaltatasok');
Route::get('/kapcsolat', [ContactController::class, 'create']);
Route::post('/contact', [ContactController::class, 'store']);
//Route::view('/contact', 'contact');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
