<?php

use App\Http\Controllers\Frontend\FrontController;
use Illuminate\Support\Facades\Route;


Route::get('/', [FrontController::class, 'index'])->name('frontend.home');
