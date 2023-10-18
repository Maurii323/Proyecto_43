<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cursosFormado extends Model
{
    use HasFactory;

    protected $table = 'cursos_formados';

    public function curso()
    {
        return $this->belongsTo(Curso::class, 'id_curso', 'id');
    }

    public function materia()
    {
        return $this->belongsTo(Materia::class, 'id_materia', 'id');
    }

    public function profesor()
    {
        return $this->belongsTo(Profesor::class, 'id_prof', 'id');
    }


}
