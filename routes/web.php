<?php

use App\Http\Controllers\AuthManager;
use App\Http\Controllers\ProductController;
use Illuminate\Auth\AuthManager as AuthAuthManager;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/login', [AuthManager::class, 'login'])->name('login');
Route::post('/login', [AuthManager::class, 'loginpost'])->name('login.post');
Route::get('/register', [AuthManager::class, 'register'])->name('register');
Route::post('/register', [AuthManager::class, 'registerpost'])->name('register.post');
Route::get('/logout', [AuthAuthManager::class, 'logout'])->name('logout');
Route::group(['middleware'=> 'auth'], function(){
    Route::get('/profile',function (){
        return "Hi";
    });
});

Route::controller(ProductController::class)->group(function(){
    Route::get('/products', 'index')->name('products.index');
    Route::get('/products/create', 'create')->name('products.create');
    Route::post('/products/create', 'createpost')->name('products.create.post');
    Route::get('/products/{product}/edit', 'edit')->name('products.edit');
    Route::put('/products/[product}','update')->name('products.update');
    Route::delete('/products/[product}', 'destroy')->name('products.destroy');
});