<?php

use App\Http\Controllers\ConsumableController;
use App\Http\Controllers\AdminController;
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


Route::get('/consumable/', [ConsumableController::class, 'index'])->name('consumable.index');

Route::post('consumable/store', [ConsumableController::class, 'store'])->name('consumable.store');

Route::delete('consumable/destroy/{id}', [ConsumableController::class, 'destroy'])->name('consumable.destroy');

Route::get('consumable/edit/{report}', [ConsumableController::class, 'edit'])->name('consumable.edit');

Route::put('consumable/update/{report}', [ConsumableController::class, 'update'])->name('consumable.update');




Route::get('/admin-panel/', [AdminController::class, 'index'])->name('admin.index');

Route::post('admin-panel/store', [AdminController::class, 'store'])->name('admin.store');

Route::delete('admin-panel/destroy/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');
