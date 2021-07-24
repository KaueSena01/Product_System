<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', [ProductController::class, 'index']);
Route::get('/produtos/create', [ProductController::class, 'create'])->middleware('auth');
Route::get('/produtos/{id}', [ProductController::class, 'show']);
Route::get('/dashboard', [ProductController::class, 'dashboard'])->middleware('auth');
Route::post('/produtos', [ProductController::class, 'store']);
Route::delete('/produtos/{id}', [ProductController::class, 'destroy'])->middleware('auth');
Route::get('/produtos/edit/{id}', [ProductController::class, 'edit'])->middleware('auth');
Route::put('/produtos/update/{id}', [ProductController::class, 'update'])->middleware('auth');
Route::post('/produtos/favorite/{id}', [ProductController::class, 'favoriteProduct'])->middleware('auth');
Route::delete('/produtos/leave/{id}', [ProductController::class, 'leaveProduct'])->middleware('auth');