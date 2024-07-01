<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CardController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/register', [RegisterController::class, "register"]);
Route::post('/login', [LoginController::class, "login"]);


Route::middleware("auth:sanctum")->group(function () {
    Route::post('/cardadd', [CardController::class, "cardAdd"]);
    Route::get('/cardgetall', [CardController::class, "cardGetAll"]);
    Route::get('/carddelete/{id}', [CardController::class, "cardDelete"]);
    Route::get('/cardget/{id}', [CardController::class, "cardFirstGet"]);
    Route::post('/cardupdate', [CardController::class, "cardUpdate"]);
});


