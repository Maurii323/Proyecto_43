<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('notas_alumnos', function (Blueprint $table) {
            // Definir la columna de clave foránea
            $table->unsignedBigInteger('id_alumno');
            $table->foreign('id_alumno')
            ->references('id')
            ->on('alumnos');
            
            $table->unsignedBigInteger('id_materia');
            $table->foreign('id_materia')
                    ->references('id')
                    ->on('materias');
            
            // Definir la clave primaria compuesta
            $table->primary(['id_alumno', 'id_materia']);

            $table->unsignedBigInteger('id_prof');
            $table->foreign('id_prof')
            ->references('id')
            ->on('profesores');

            $table->unsignedBigInteger('id_notas');
            $table->foreign('id_notas')
            ->references('id')
            ->on('notas');
    
        });

        Schema::create('cursos_formados', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('id_curso');
            $table->foreign('id_curso')
            ->references('id')
            ->on('cursos');

            $table->unsignedBigInteger('id_materia');
            $table->foreign('id_materia')
            ->references('id')
            ->on('materias');

            $table->unsignedBigInteger('id_prof');
            $table->foreign('id_prof')
            ->references('id')
            ->on('profesores');
    
        });

        Schema::create('cursosform_alumnos', function (Blueprint $table) {

            $table->unsignedBigInteger('id_cursosform');
            $table->foreign('id_cursosform')
            ->references('id')
            ->on('cursos_formados');

            $table->unsignedBigInteger('id_alumno');
            $table->foreign('id_alumno')
            ->references('id')
            ->on('alumnos');

            $table->primary(['id_cursosform', 'id_alumno']);
    
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
