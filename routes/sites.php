<?php

use App\Http\Controllers\Frontend\FrontController;
use App\Http\Controllers\Frontend\AuthorController;
use App\Http\Controllers\Frontend\PostController;
use App\Http\Controllers\Frontend\CategoryController;
use App\Http\Controllers\Frontend\SearchController;

use Illuminate\Support\Facades\Route;


Route::get('/', [FrontController::class, 'index'])->name('frontend.home');

// search (must stay above the {slug} catch-all)
Route::middleware('throttle:60,1')->group(function () {
    Route::get('search', [SearchController::class, 'index'])->name('frontend.search');
    Route::post('search', [SearchController::class, 'store'])->name('frontend.search.store');
    Route::get('search/term/{term}', [SearchController::class, 'term'])->name('frontend.search.term');
});
Route::get('/news/{id}', [PostController::class, 'newsIndex'])->name('frontend.news.show');

// for all dynamic post and page
Route::match(['get', 'post'], '{slug}', [PostController::class, 'index'])->name('frontend.post.index');

// category
Route::get('category/{category_slug}/', [CategoryController::class, 'index'])->name('frontend.category.index');

// author
Route::get('author/{author_slug}/', [AuthorController::class, 'index'])->name('frontend.author.index');