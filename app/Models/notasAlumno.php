<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class notasAlumno extends Model
{
    use HasFactory;

    protected $table = 'notas_alumnos';

    public function alumno()
    {
        return $this->belongsTo(Alumno::class, 'id_alumno', 'id');
    }
    
    public function nota()
    {
        return $this->belongsTo(Nota::class, 'id_notas', 'id');
    }

    public function materia()
    {
        return $this->belongsTo(Materia::class, 'id_materia', 'id');
    }

    // aca van todas las columnas que se van a asignar en masa
    protected $fillable = [
        'id_alumno',
        'id_materia',
        'id_prof',
        'id_notas'

    ];
    
    //desactiva el registro de cambios automaticos
    public $timestamps = false;
}
