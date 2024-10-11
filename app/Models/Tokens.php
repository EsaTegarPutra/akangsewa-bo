<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tokens extends Model
{
  protected $table = 'token';
  protected $primaryKey = 'id';
  protected $fillable = [
    'token'
  ];
}
