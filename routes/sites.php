<?php

use App\Http\Controllers\Frontend\FrontController;
use App\Http\Controllers\Frontend\AuthorController;
use App\Http\Controllers\Frontend\PostController;
use App\Http\Controllers\Frontend\CategoryController;

use Illuminate\Support\Facades\Route;


Route::get('/', [FrontController::class, 'index'])->name('frontend.home');
Route::get('/news/{id}', [PostController::class, 'newsIndex'])->name('frontend.news.show');

// for all dynamic post and page
Route::match(['get', 'post'], '{slug}', [PostController::class, 'index'])->name('frontend.post.index');

// category
Route::get('category/{category_slug}/', [CategoryController::class, 'index'])->name('frontend.category.index');

// author
Route::get('author/{author_slug}/', [AuthorController::class, 'index'])->name('frontend.author.index');