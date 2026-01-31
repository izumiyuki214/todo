<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\CategoryController;
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

Route::get('/', [TodoController::Class, 'index']);
Route::post('/todos', [TodoController::Class, 'store']);
Route::patch('/todos/update', [TodoController::Class, 'update']);
Route::delete('/todos/delete', [TodoController::Class, 'destroy']);
Route::get('/categories', [CategoryController::Class, 'index']);
Route::post('/categories', [CategoryController::Class, 'store']);
Route::patch('/categories/update', [CategoryController::Class, 'update']);
Route::delete('/categories/delete', [CategoryController::Class, 'destroy']);