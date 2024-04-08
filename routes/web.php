<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PokemonController;

Route::get('/', function () {
    return view('welcome');

});

//Realizamos todos en uno solo
Route::resource('/pokemones',PokemonController::class);
//Index en el controlador
//Route::get('pokemones', [PokemonController::class], 'index');
//Refrencia en create del controllador
//Route::get('pokemones/create', [PokemonController::class], 'create');
