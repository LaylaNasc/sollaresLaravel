<?php

namespace App\Models;

use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable implements CanResetPassword
{
    use HasFactory;
    use Notifiable;

    protected $fillable = ['nome', 'cargo', 'login', 'password', 'email'];
    protected $hidden = ['password'];
    protected $table = 'usuarios';

    public function getAuthPassword()
{
    return $this->password;
}

}

