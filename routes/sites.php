<?php

use App\Http\Controllers\Frontend\FrontController;
use App\Http\Controllers\Frontend\PostController;

use Illuminate\Support\Facades\Route;


Route::get('/', [FrontController::class, 'index'])->name('frontend.home');
// for all dynamic post and page
Route::match(['get', 'post'], '{slug}', [PostController::class, 'index'])->name('frontend.post.index');