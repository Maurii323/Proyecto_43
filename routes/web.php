<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\cursosController;  //añadir los controllers que se utilizan
use App\Http\Controllers\alumnosController;
use App\Http\Controllers\notasController;
use App\Http\Controllers\ProfesorAuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Muestra la vista para loguearse (ruta de acceso público)
Route::get('/login', [ProfesorAuthController::class, "showLoginForm"])->name('mostrar-login');

// Intenta autenticar al profesor utilizando el DNI y la contraseña proporcionados.
// Si la autenticación es exitosa, redirige al menú del profesor; de lo contrario, muestra un mensaje de error.
Route::post('/autorizacion', [ProfesorAuthController::class, "login"])
    ->middleware('guest:profesor') // Middleware para permitir solo a usuarios no autenticados
    ->name('login');

// Grupo de rutas protegidas que requieren autenticación
Route::middleware(['web'])->group(function () {
    // Ruta del menú del profesor
    Route::get('/menu', function () {
        return view('menu_docente');
    })->name("menu");

    // Cierra la sesión del profesor y redirige al formulario de inicio de sesión.
    Route::get('profesor/logout', [ProfesorAuthController::class, "logout"])->name('logout');

    // llama al show del cursosControlador que tiene los cursos asociados al profesor que inicio sesion, se ejecuta cuando el profesor inicia sesion
    Route::get("/cursos", [cursosController::class, "show"])->name("cursos-show");

    // llama al show de alumnosControlador que tiene los alumnos del curso que selecciono el profesor, se ejecuta cuando el profesor clickea un curso
    Route::get("/alumnos/{id_curso}/{id_materia}", [alumnosController::class, "show"])->name("alumnos-show");

    // llama al store de notasControlador que guarda la nota que ingreso el profesor, se ejecuta cuando el profesor pone la nota y la guarda
    Route::post("/alumnos/{id_alumno}", [notasController::class, "store"])->name("alumnos-store");
    
});

/*Route::middleware([ 'web'])->group(function () {
    // Rutas que necesitan protección CSRF deshabilitada
    // llama al show de alumnosControlador que tiene los alumnos del curso que selecciono el profesor, se ejecuta cuando el profesor clickea un curso
    Route::get("/alumnos/{id_curso}/{id_materia}", [alumnosController::class, "show"])->name("alumnos-show");
    // ...
});*/




