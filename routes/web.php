<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\postdataController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\TransactionController;

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
    return view('Pages.add_stock');
});

Route::post('post_stock',[StockController::class,'store'])->name('post_stock');
Route::get('/',[StockController::class,'show_data']);
Route::post('transation_done',[TransactionController::class,'store'])->name('transation_done');
