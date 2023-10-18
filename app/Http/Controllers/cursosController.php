<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\curso;
use App\Models\cursosFormado;
use Auth;

class cursosController extends Controller
{
    public function show(){
        if(empty(session('id_profesor'))){
            return redirect()->route('mostrar-login');
        }else{
            $id_profesor = session('id_profesor');
        }
        // Consulta la tabla cursos_formados para obtener los registros donde el profesor está inscripto
        $cursosFormados = CursosFormado::where('id_prof', $id_profesor)->get();

        // Inicializa una colección para almacenar los detalles de los cursos
        $cursos = collect();
        $materias = collect();
        // Recorre los registros encontrados y obtén los detalles de cada curso
        foreach ($cursosFormados as $cursoFormado) {
            $curso = $cursoFormado->curso;
            $cursos->push($curso);
            $materia = $cursoFormado->materia;
            $materias->push($materia);
        }
        // Guarda los cursos y materias en la sesión
        session(['cursos' => $cursos]);
        session(['materias' => $materias]);

        Auth::guard('profesor')->logout();


        // Pasa los cursos a la vista para su visualización
        return view('carga_notas', compact('cursos', 'materias'));
    }
    
}

