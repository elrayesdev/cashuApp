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


Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

// users
    // show all users
    Route::get('/users',[UserController::class, 'index'])->middleware(['isSuper'])->name('users');

    // create user
    Route::get('/users/add',[UserController::class, 'create'])->middleware('isSuper');   // create view
    Route::post('/users',[UserController::class, 'store'])->middleware('isSuper')->name('createUser');      // create submit

// sales
    // show all sales
    Route::get('/sales',[SalesController::class, 'index'])->middleware('isSales');
    // create sales
    Route::get('/sales/add',[SalesController::class, 'create'])->middleware('isSales');   // create view
    Route::post('/sales',[SalesController::class, 'store'])->middleware('isSales')->name('createSales');      // create submit


//config
    // show all configs
    Route::get('/configs',[ConfigController::class, 'index'])->middleware('isBack');

    // edit config
    Route::get('/configs/{id}/edit',[ConfigController::class, 'edit'])->middleware('isBack');  // edit view
    Route::put('/configs/{id}',[ConfigController::class, 'update'])->middleware('isBack')->name('updateTarget');     // submit edit

});

require __DIR__.'/auth.php';
