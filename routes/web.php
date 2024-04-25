<?php

use App\Http\Controllers\EmpleadosController;
use App\Http\Controllers\ProveedoresController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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

Route::get('/', function () {
    return view('auth.login');
});

Route::resource('empleados', EmpleadosController::class)->middleware('auth');

Auth::routes(['register'=>false,'reset'=>false]);

Route::get('/home', [EmpleadosController::class, 'index'])->name('home');

Route::group(['middleware'=>'auth'], function(){
    Route::get('/', [EmpleadosController::class, 'index'])->name('home');
});

Route::resource('proveedores', ProveedoresController::class) ->middleware('auth');

Route::get('/home', [ProveedoresController::class, 'index'])->name('home');

Route::group(['middleware'=>'auth'], function(){
    Route::get('/', [ProveedoresController::class, 'index'])->name('home');
});








