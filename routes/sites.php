<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return response()->json([
        'status' => true,
        'message' => 'Welcome to the frontend.',
    ]);
});