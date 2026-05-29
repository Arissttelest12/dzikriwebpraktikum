<?php

use App\Http\Controllers\APIController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/login', [APIController::class, 'login']);

Route::middleware('auth:sanctum')->group(function(){
    Route::get('/books', [APIController::class, 'books']);
    Route::post('/books', [APIController::class, 'store']);
    Route::patch('/books/{id}', [APIController::class, 'update']);
    Route::delete('/books/{id}', [APIController::class, 'destroy']);
});
