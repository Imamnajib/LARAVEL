<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\GenreController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);
Route::post('/logout',[AuthController::class,'logout'])->middleware('auth:api');




//Route api untuk login 

Route::apiResource('/Book' , BookController::class)->only(['index' ,'show']);

Route::middleware(['auth:api'])->group(function(){
    Route::get('/Genre' , [GenreController::class,'index']);


    Route::middleware(['role:admin'])->group(function(){
    Route::apiResource('/Book' , BookController::class)->only(['store' , 'update' , 'destroy' ]);
    });

});
















Route::apiResource('/Author' , AuthorController::class);








