<?php

use App\Http\Controllers\ChirpController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ChirpController::class, "index"]);

Route::post('/chirps', [ChirpController::class, "store"]);

Route::put('/chirps/{id}', [ChirpController::class, "update"]);

Route::delete('/chirps/{id}', [ChirpController::class, "destroy"]);

Route::get('/about', function(){
    return view('about');
});
