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

Route::post('consumable/store', [ConsumableController::class, 'store'])->name('consumable.store');

Route::delete('consumable/destroy/{id}', [ConsumableController::class, 'destroy'])->name('consumable.destroy');

Route::post('consumable/edit/{id}', [ConsumableController::class, 'edit'])->name('consumable.edit');


Route::get('/admin-panel/', [ConsumableController::class, 'index']);

Route::post('admin-panel/store', [ConsumableController::class, 'store'])->name('consumable.store');

Route::delete('admin-panel/destroy/{id}', [ConsumableController::class, 'destroy'])->name('consumable.destroy');
