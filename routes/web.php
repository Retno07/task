<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])
    ->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
    ->name('home');




Route::prefix('office')
    ->namespace('Admin')
    ->group(function() {
        Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])
        ->name('dashboard');

        Route::resource('list-task', '\App\Http\Controllers\Admin\ListTaskController');
       
    });

Auth::routes(['verify' => true]);
