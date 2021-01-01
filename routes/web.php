<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::redirect('/', 'items');

Route::resource('/items', ItemController::class);

Route::get('/items/cat/{category}', [ItemController::class, 'itemsByCat'])->name('items.cat');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('orders', OrderController::class)->middleware('auth');
Route::get('orders.basket', [OrderController::class, 'basket'])->name('orders.basket')->middleware('auth');
Route::get('orders.purchases', [OrderController::class, 'purchases'])->name('orders.purchases')->middleware('auth');

Route::resource('roles', RoleController::class);
Route::get('roles/permissions/{role}', [RoleController::class, 'permissions'])->name('roles.permissions');
Route::put('roles/take_permission/{role}/{permission}', [RoleController::class, 'take_permission'])->name('roles.take_permission');
Route::put('roles/give_permission/{role}/{permission}', [RoleController::class, 'give_permission'])->name('roles.give_permission');

Route::resource('users', UserController::class);
Route::get('users/roles/{user}', [UserController::class, 'roles'])->name('users.roles');
Route::put('users/take_role/{user}/{role}', [UserController::class, 'take_role'])->name('users.take_role');
Route::put('users/give_role/{user}/{role}', [UserController::class, 'give_role'])->name('users.give_role');

Route::resource('categories', CategoryController::class);

Route::resource('materials', MaterialController::class);

Route::resource('reviews', ReviewController::class);

//---------------------------------------

Route::get('/login', [LoginController::class, 'loginForm'])->name('loginform');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', [RegisterController::class, 'registerForm'])->name('registerform');
Route::post('/register', [RegisterController::class, 'register'])->name('register');
