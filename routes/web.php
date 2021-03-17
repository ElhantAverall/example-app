<?php

use App\Http\Controllers\ConsumableController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Console\Input\Input;

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


Route::get('/consumable/', [ConsumableController::class, 'index']);

Route::post('store', [ConsumableController::class, 'store'])->name('consumable.store');

Route::post('destroy/{id}', [ConsumableController::class, 'destroy'])->name('consumable.destroy');

Route::post('edit/{id}', [ConsumableController::class, 'edit'])->name('consumable.edit');
