<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\nota;
use App\Models\notasAlumno;
use App\Models\Alumno;


class notasController extends Controller
{
    public function store(Request $request, $id_alumno){            // metodo para el insert de la nota del alumno
        $id_curso = session('id_curso');
        $id_materia = session('id_materia');
        // Validación de datos del formulario
        $request->validate([
            'nota' => 'required|numeric',
            'comentario' => 'nullable|string',
        ]);

        // Crear una nueva nota en la tabla de notas
        $nota = Nota::create([
            'nota' => $request->input('nota'),
            'comentario' => $request->input('comentario'),
        ]);

        // Crear una nueva entrada en la tabla de notasAlumnos para relacionar las tablas
        $id_prof = 1;
        $notasAlumnos = NotasAlumno::create([
            'id_alumno' => $id_alumno,
            'id_materia' => $id_materia,
            'id_prof' => $id_prof,
            'id_notas' => $nota->id // Usamos el ID de la nota creada anteriormente
        ]);

        return redirect()->route('alumnos-show', ['id_curso' => $id_curso, 'id_materia' => $id_materia ]);
    }
}
