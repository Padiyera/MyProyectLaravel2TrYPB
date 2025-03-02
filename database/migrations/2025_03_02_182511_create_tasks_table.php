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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id'); // Cambiado a unsignedBigInteger
            $table->string('persona_contacto');
            $table->string('telefono_contacto');
            $table->text('descripcion');
            $table->string('correo_electronico');
            $table->string('direccion');
            $table->string('poblacion');
            $table->string('codigo_postal');
            $table->unsignedInteger('provincia');
            $table->enum('estado', ['P', 'R', 'C']);
            $table->timestamp('fecha_creacion')->useCurrent();
            $table->string('operario_encargado');
            $table->date('fecha_realizacion');
            $table->text('anotaciones_anteriores')->nullable();
            $table->text('anotaciones_posteriores')->nullable();
            $table->string('fichero_resumen')->nullable();
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
