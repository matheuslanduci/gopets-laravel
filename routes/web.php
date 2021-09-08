<?php

use App\Http\Controllers\WebsitePetController;
use Illuminate\Support\Facades\Route;

Route::get("/", function () {
  return view("index");
})->name("home");

Route::get("/dashboard", [WebsitePetController::class, "index"])->name("dashboard");

Route::get("/pets/new", [WebsitePetController::class, "store"])->name("pets.new");

Route::get("/pets/udpate/{id}", [WebsitePetController::class, "update"])->name("pets.update/{id}");
