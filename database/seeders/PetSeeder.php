<?php

namespace Database\Seeders;

use App\Models\Pet;
use Illuminate\Database\Seeder;

class PetSeeder extends Seeder {
  public function run() {
    Pet::create([
      'name' => 'Bob',
      'age' => 10,
      'type' => 'cat',
      'breed' => 'Mutt',
      'ownerName' => 'Matheus',
      'ownerContact' => '(15) 99690-0893'
    ]);
  }
}
