<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cursosformAlumno extends Model
{
    use HasFactory;

    protected $table = 'cursosform_alumnos';

    public function cursos_formado()
    {
        return $this->belongsTo(cursosFormado::class, 'id_cursosform', 'id');
    }
    
    public function alumno()
    {
        return $this->belongsTo(Alumno::class, 'id_alumno', 'id');
    }
}
