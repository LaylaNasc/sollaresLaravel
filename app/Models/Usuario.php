<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
   use HasFactory;

   protected $fillable = [
      'nome', 
      'cargo', 
      'login', 
      'senha', 
      'email'
  ];

  protected $table = 'usuarios';
}
