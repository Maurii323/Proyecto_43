<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nota extends Model
{
    use HasFactory;

    // aca van todas las columnas que se van a asignar en masa
    protected $fillable = [
        'nota',
        'comentario'
    ];

    //desactiva el registro de cambios automaticos
    public $timestamps = false;
}
