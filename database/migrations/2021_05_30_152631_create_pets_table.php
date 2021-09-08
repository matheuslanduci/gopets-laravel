<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreatePetsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('pets', function (Blueprint $table) {
      $table->uuid('id')->primary();
      $table->string('name');
      $table->integer('age');
      $table->string('type');
      $table->string('breed');
      $table->string('ownerName');
      $table->string('ownerContact');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('pets');
  }
}
