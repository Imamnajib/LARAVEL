<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\GenreController;
use App\Models\Author;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');




Route::apiResource('/Author' , AuthorController::class);

Route::apiResource('/Genre' , GenreController::class);

Route::apiResource('/Book' , BookController::class);



