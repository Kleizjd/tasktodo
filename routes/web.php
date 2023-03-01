<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\TodosController;
use Illuminate\Support\Facades\Route;

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

// Todos
Route::get('/tasks',[TodosController::class, 'index'])->name('todos');
Route::post('/tasks',[TodosController::class, 'store'])->name('todos');
Route::get('/tasks/{id}',[TodosController::class, 'show'])->name('todos-edit');
Route::patch('/tasks/{id}',[TodosController::class, 'update'])->name('todos-update');
Route::delete('/tasks/{id}',[TodosController::class, 'destroy'])->name('todos-destroy');
// CATEGORIES
Route::get('/categories',[CategoriesController::class, 'index'])->name('categories');
Route::post('/categories',[CategoriesController::class, 'store'])->name('categories');
Route::get('/categories/{id}',[CategoriesController::class, 'show'])->name('categories-edit');
Route::patch('/categories/{id}',[CategoriesController::class, 'update'])->name('categories-update');
// Route::patch('/categories/{id}',[CategoriesController::class, 'update'])->name('categories-update');
Route::delete('/categories/{id}',[CategoriesController::class, 'destroy'])->name('categories-destroy');
// //USERS

