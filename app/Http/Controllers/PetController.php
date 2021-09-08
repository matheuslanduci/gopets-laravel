<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pet;
use Illuminate\Http\Request;

class PetController extends Controller
{
  public function index(Request $request)
  {
    $page = $request->input("page", 1);

    $pets = Pet::paginate(10, ['*'], 'page', $page);

    return ["pets" => $pets];
  }

  public function show($id)
  {
    $pet = Pet::where('id', $id)->first();

    if (!isset($pet)) {
      return [
        "error" => true,
        "message" => "This pet doesn't exist."
      ];
    }

    return $pet;
  }

  public function store(Request $request)
  {
    $request->validate([
      "name" => ["bail", "required", "string"],
      "age" => ["bail", "required", "numeric"],
      "type" => ["bail", "required", "string"],
      "breed" => ["bail", "required", "string"],
      "owner.name" => ["bail", "required", "string"],
      "owner.contact" => ["bail", "required", "string"]
    ]);

    $data = $request->json()->all();

    Pet::create([
      'name' => $data['name'],
      'age' => $data['age'],
      'type' => $data['type'],
      'breed' => $data['breed'],
      'ownerName' => $data['owner']['name'],
      'ownerContact' => $data['owner']['contact']
    ]);

    return [
      "message" => "The pet was successfully created."
    ];
  }

  public function update(Request $request)
  {
    $request->validate([
      "id" => ["bail", "required", "string"],
      "name" => ["bail", "required", "string"],
      "age" => ["bail", "required", "numeric"],
      "type" => ["bail", "required", "string"],
      "breed" => ["bail", "required", "string"],
      "owner.name" => ["bail", "required", "string"],
      "owner.contact" => ["bail", "required", "string"]
    ]);

    $data = $request->json()->all();

    $pet = Pet::where('id', $data['id'])->first();

    if (!isset($pet)) {
      return [
        "error" => true,
        "message" => "This pet doesn't exist."
      ];
    }

    $pet->name = $data['name'];
    $pet->age = $data['age'];
    $pet->type = $data['type'];
    $pet->breed = $data['breed'];
    $pet->ownerName = $data['owner']['name'];
    $pet->ownerContact = $data['owner']['contact'];

    $pet->save();

    return [
      "message" => "The pet was successfully updated."
    ];
  }

  public function destroy($id)
  {
    $pet = Pet::where('id', $id)->get();

    if (!isset($pet)) {
      return [
        "error" => true,
        "message" => "This pet doesn't exist."
      ];
    }

    Pet::where('id', $id)->delete();

    return [
      "message" => "The pet was successfully deleted!",
      "pet" => $pet
    ];
  }
}
