<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\v1\CharacterController;


Route::post('register',[AuthController::class,'register']);
Route::post('login',[AuthController::class,'login']);

Route::post('v1/character/buscar',[CharacterController::class,'buscar']);
Route::get('v1/character/index',[CharacterController::class,'index']);

Route::middleware(['auth:sanctum'])->group(function(){
    Route::apiResource('v1/character', CharacterController::class);
    Route::get('logout',[AuthController::class,'logout']);
});
