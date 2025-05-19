<?php

use App\Http\Controllers\GenreController;
use App\Http\Controllers\AuthorController;
use Illuminate\Support\Facades\Route;



Route::get('/Genre', [GenreController::class , 'index']);
Route::get('/Author', [AuthorController::class , 'index']);


