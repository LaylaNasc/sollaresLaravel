<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    use HasFactory;

    protected $fillable = ['nome', 'cargo', 'login', 'senha', 'email'];
    protected $hidden = ['senha'];
    protected $table = 'usuarios';

    public function getAuthPassword()
{
    return $this->senha;
}

}
