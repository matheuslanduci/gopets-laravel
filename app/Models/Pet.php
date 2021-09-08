<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Uuid;

class Pet extends Model
{
  use HasFactory;
  use Uuid;

  protected $keyType = 'string';

  public $incrementing = false;

  protected $fillable = [
    "name",
    "age",
    "type",
    "breed",
    "ownerName",
    "ownerContact",
  ];
}
