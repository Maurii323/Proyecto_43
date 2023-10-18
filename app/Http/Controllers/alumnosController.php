<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\alumno;
use App\Models\cursosFormado;
use App\Models\cursosformAlumno;
use App\Models\nota;
use App\Models\notasAlumno;
use App\Models\materia;



class alumnosController extends Controller
{
    public function show($id_curso,$id_materia){
        if(empty(session('id_profesor'))){
            return redirect()->route('mostrar-login');
        }
        // Consulta la tabla cursos_formados para obtener el curso y materia
        $cursoFormado = CursosFormado::where('id_curso', $id_curso)
        ->where('id_materia', $id_materia)
        ->get();

        // Consulta la tabla cursosform_alumnos para obtener los id de los alumnos asociado a ese curso/materia
        $cursosformAlumnos = CursosformAlumno::where('id_cursosform', $cursoFormado[0]['id'])->get();

        // Recorre los registros encontrados para obtener los detalles de los alumnos
        $alumnos = collect();
        foreach ($cursosformAlumnos as $cursosformAlumno) {
            $alumno = $cursosformAlumno->alumno;
            $alumnos->push($alumno); 
        }

        //recorre los alumnos para encontrar el id de sus notas segun la materia
        $id_notas = collect();
        foreach ($alumnos as $alumno) {
            $id_notas->push( notasAlumno::where('id_alumno', $alumno->id)
            ->where('id_materia', $id_materia)
            ->get() );
        }

        //recorre los id para obtener los detalles de las notas
        $notas = collect();
        foreach ($id_notas as $notasCollection) {
            foreach ($notasCollection as $nota) {
                $id = $nota->id_notas;
                $notas->push( Nota::find($id) );      // encuentra un registro segun su id       
            }
        }
 
        // Obtiene los cursos del profesor que estan en la sesión
        $cursos = session('cursos');
        $materias = session('materias');

        // Guarda los alumnos y las notas en la sesión, y los id de curso y materia
        session(['alumnos' => $alumnos]);
        session(['notas' => $notas]);
        session(['id_curso' => $id_curso]);
        session(['id_materia' => $id_materia]);

        // Obtiene el nombre de la materia y la guarda en la session
        $nombreMateria = Materia::find($id_materia) ;
        session(['nombreMateria' => $nombreMateria->nombre]);
        // Pasa todo a la vista para su visualización
        return view('carga_notas', compact('alumnos','cursos','materias','notas'));
    }
}
