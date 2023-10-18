<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;


class profesor extends Model implements Authenticatable
{
    use HasFactory;
    protected $guard = 'profesor';

    public function getAuthIdentifierName()
    {
        return 'id'; // Nombre del campo de identificación del usuario
    }

    public function getAuthIdentifier()
    {
        return $this->getKey(); // Devuelve el valor de la clave primaria del usuario
    }

    public function getAuthPassword()
    {
        return $this->password; // Devuelve la contraseña del usuario
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }

    public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    
}
