<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProductController;

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

Route::get('/', [AuthenticatedSessionController::class, 'create'])
    ->middleware('guest')
    ->name('login');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
/**
 * Route for products crud
 */
Route::get('/products', [ProductController::class, 'index'])->middleware(['auth'])->name('products');
Route::post('/save', [ProductController::class, 'store'])->middleware(['auth'])->name('save');
Route::get('/edit/{id}', [ProductController::class, 'edit'])->middleware(['auth'])->name('edit.id');
Route::patch('/update', [ProductController::class, 'updateProduct'])->middleware(['auth'])->name('update');
Route::get('/delete/{id}', [ProductController::class, 'destroy'])->middleware(['auth'])->name('delete.id');
Route::delete('/selected-products', [ProductController::class, 'deleteAll'])->middleware(['auth'])->name('selected.product');
require __DIR__ . '/auth.php';
