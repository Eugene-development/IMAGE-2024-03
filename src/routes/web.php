<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\TestController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/upload-image', [ImageController::class, 'store']);
Route::get('/ggg', [TestController::class, 'imageStore']);
