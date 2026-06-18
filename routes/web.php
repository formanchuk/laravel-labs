<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Публічні роути для категорій
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{id}', [CategoryController::class, 'show'])->name('categories.show');

// Публічні роути для постів
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');

// 🆕 РОУТ ДЛЯ КОЛЕКЦІЙ (ЛАБОРАТОРНА 5)
Route::get('/collections', [CategoryController::class, 'collectionExample'])->name('collections');

// 🆕 АДМІНКА КАТЕГОРІЙ (ЛАБОРАТОРНА 4)
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('categories', App\Http\Controllers\Admin\CategoryController::class);
});