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
        //crear las tablas de la base de datos
        Schema::create('notas', function (Blueprint $table) {
            $table->id();
            $table->integer("nota");
            $table->integer("porcentaje_asist");
            $table->boolean("regular");
            $table->boolean("promovido");
            $table->text("comentario");
        });

        Schema::create('materias', function (Blueprint $table) {
            $table->id();
            $table->string("nombre");
            $table->integer("horas_catedra");

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
