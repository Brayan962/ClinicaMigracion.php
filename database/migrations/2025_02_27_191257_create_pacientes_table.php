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
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('identidad');
            $table->enum('tipo_documento', ['DNI','PASAPORTE','OTROS'])->default('DNI');
            $table->datetimes('fecha_nacimiento');
            $table->string('telefono');
            $table->enum('sexo', ['Masculino','Femenino'])->default('Prefiero no decirlo');
            $table->string('direccion');
            $table->string('contacto_emergencia')->nullable();
            $table->string('alergias')->nullable();
            $table->text('obervaciones')->nullable();


            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pacientes');
    }
};
