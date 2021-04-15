<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
  use HasFactory, Uuid;

  protected $connection = 'tenant';

  protected $fillable = [
    'name',
  ];
}
