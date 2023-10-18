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
        Schema::create('alumnos', function (Blueprint $table) {
            $table->id();
            $table->integer("legajo");
            $table->string("nombre");
            $table->string("apellido");
            $table->integer("dni");
            $table->string("contraseña");
            $table->string("foto_perfil");
            $table->string("correo");
        });

        Schema::create('profesores', function (Blueprint $table) {
            $table->id();
            $table->integer("legajo");
            $table->string("nombre");
            $table->string("apellido");
            $table->string("dni");
            $table->string("contraseña");
            $table->string("correo");
            $table->string("foto_perfil");
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
