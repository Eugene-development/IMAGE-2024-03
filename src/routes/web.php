<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;

Route::get('/', function () {
    return 'Hello World';
});

Route::post('/upload-image', ImageController::class);
