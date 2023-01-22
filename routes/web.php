<?php

use Illuminate\Support\Facades\Route;
use App\Models\listing;
use App\Http\Controllers\listingcontroller;
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

Route::get('/',[listingcontroller::class ,'index'])->name('index');
Route::get('/listing/{id}',[listingcontroller::class ,'show']);
Route::get('/listings/create',[listingcontroller::class ,'create']);
Route::post('/listings',[listingcontroller::class ,'store'])->name('store');
Route::get('/listing/{id}/edite',[listingcontroller::class,'edite']);
Route::put('/listing/{id}/update',[listingcontroller::class,'update']);
Route::delete('/listing/{id}',[listingcontroller::class ,'destroy']);
// Show Register/Create Form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

// Create New User
Route::post('/users', [UserController::class, 'store']);

// Log User Out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// Show Login Form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// Log In User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);
