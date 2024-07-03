<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\MailController;




Route::post('/register', [UserController::class, "register"]);
Route::post('/login', [UserController::class, "login"]);



Route::middleware("auth:sanctum")->group(function () {
    Route::post('/cardadd', [CardController::class, "cardAdd"]);
    Route::get('/carddelete/{id}', [CardController::class, "cardDelete"]);
    Route::get('/cardget', [CardController::class, "cardFirstGet"]);
    Route::get('/cardcache/{id}', [CardController::class, "cardCache"]);
    Route::post('/cardupdate', [CardController::class, "cardUpdate"]);
    Route::get('/cardgetall', [CardController::class, "cardGetAll"]);
    Route::get('/cacheput', [CardController::class, "cachePut"]);
    Route::post('/mail', [MailController::class, "mailSend"]);
});


