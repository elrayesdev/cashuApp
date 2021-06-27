<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\ConfigController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth','verified'])->name('dashboard');

// users
    // show all users
    Route::get('/users',[UserController::class, 'index'])->middleware('auth');

    // create user
    Route::get('/users/add',[UserController::class, 'create'])->middleware('auth');   // create view
    Route::post('/users',[UserController::class, 'store'])->middleware('auth');      // create submit

// sales
    // show all sales
    Route::get('/sales',[SalesController::class, 'index'])->middleware('auth');

//config
    // show all configs
    Route::get('/configs',[ConfigController::class, 'index'])->middleware('auth');

    // show single config
    Route::get('/configs/{id}',[ConfigController::class, 'show'])->middleware('auth');

    // edit config
    Route::get('/configs/{id}/edit',[ConfigController::class, 'edit'])->middleware('auth');  // edit view
    Route::patch('/configs/{id}',[ConfigController::class, 'update'])->middleware('auth');     // submit edit








require __DIR__.'/auth.php';
