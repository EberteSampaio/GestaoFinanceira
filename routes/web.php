<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\SaidasController;

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



Route::prefix('saidas')->namespace('Saidas')->group(function () {
   Route::get('/',[SaidasController::class,'index'])->name('saidas.index');
   Route::get('/create',[SaidasController::class,'create'])->name('saidas.create');
   Route::post('',[SaidasController::class, 'store'])->name('saidas.store');
});

Route::redirect('/','/saidas');
