<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pet;
use Illuminate\Http\Request;

class WebsitePetController extends Controller
{
  public function index(Request $request)
  {
    $page = $request->input("page", 1);

    $pets = Pet::paginate(10, ['*'], 'page', $page);
    $petsLength = $pets->count();
    $totalPets = Pet::count();

    return view("dashboard", ["pets" => $pets, "selectedPage" => $page, "totalPets" => $totalPets, "petsLength" => $petsLength]);
  }

  public function store()
  {
    return view("newpet");
  }

  public function update($id)
  {
    $pet = Pet::where("id", "=", $id)->first();

    if (!isset($pet)) {
      return view("updatepet", [
        "error" => true,
        "message" => "This pet doesn't exist."
      ]);
    }

    return view("updatepet", ["pet" => $pet, "error" => false]);
  }
}
