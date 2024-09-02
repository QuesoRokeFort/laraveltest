<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;


Route::get('/home', [AuthManager::class,'home'])->name('home');
Route::get('/', [AuthManager::class, 'login'])->name('login');
Route::get('/login', [AuthManager::class, 'login'])->name('login');
Route::post('/login',[AuthManager::class, 'loginPost'])->name('login.post');
Route::get('/signup', [AuthManager::class, 'signup'])->name('signup');
Route::post('/signup',[AuthManager::class, 'signupPost'])->name('signup.post');
Route::get('/logout',[AuthManager::class, 'logout'])->name('logout');
Route::group(['middleware' => 'auth'], function(){
    Route::get('/profile',[AuthManager::class, 'profile'])->name('profile');
});