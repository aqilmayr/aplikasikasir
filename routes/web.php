<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProdukController;


Route::get('/',[UserController::class,'login'])->name('login');
Route::get('/register',[UserController::class,'register'])->name('register');
Route::post('/register', [UserController::class, 'registerStore'])->name('register.store');
Route::post('/login-check', [UserController::class, 'loginCheck'])->name('login-check');

Route::resource('users', UserController::class);

//dashboard
Route::get('/dashboard', function() {
    return view('admin.dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get("/logout", [UserController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('produk', ProdukController::class);
});
