<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Profesor;




class ProfesorAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            $credentials = $request->only('dni', 'password');

            if (Auth::guard('profesor')->attempt($credentials)) {
                // La autenticación fue exitosa
                $profesor = Profesor::where('dni', $request->input('dni') )->first();
                $id_profesor = $profesor->id;
                session_start();
                session(['id_profesor' => $id_profesor]);
                session(['usuario' => $profesor->nombre]);

                return redirect()->route('menu');
            }
            // La autenticación falló
            return redirect()->route('mostrar-login')->with('error', 'DNI o contraseña incorrectos');
        }
    }

    public function logout()
    {
        Auth::guard('profesor')->logout();
        session(['id_profesor' => ""]);
        return redirect()->route('mostrar-login');
    
    }
}
