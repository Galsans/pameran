<?php

use App\Http\Controllers\MuridController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('murid', [MuridController::class, 'index'])->name('murid.index');
Route::get('murid-create', [MuridController::class, 'create'])->name('murid.create');
Route::post('murid-store', [MuridController::class, 'store'])->name('murid.store');

Route::get('murid-edit/edit/{id}', [MuridController::class, 'edit'])->name('murid.edit');
Route::post('murid-update/{id}', [MuridController::class, 'update'])->name('murid.update');
Route::delete('murid-destroy/{id}', [MuridController::class, 'destroy'])->name('murid.destroy');

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
