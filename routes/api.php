<?php

use App\Http\Controllers\PetController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get("/pets", [PetController::class, "index"])->name("api.pets.get");
Route::get("/pet/{id}", [PetController::class, "show"])->name("api.pet.get/{id}");
Route::post("/pets", [PetController::class, "store"])->name("api.pets.post");
Route::put("/pet", [PetController::class, "update"])->name("api.pet.put");
Route::delete("/pet/{id}", [PetController::class, "destroy"])->name("api.pet.delete/{id}");
