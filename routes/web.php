<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClubeController;
use App\Http\Controllers\JogadorController;

Route::resources([
    "jogador" => AlunoController::class,
    "clube" => ClubeController::class
]);

Route::get('/', function () {
    return view('welcome');
});
