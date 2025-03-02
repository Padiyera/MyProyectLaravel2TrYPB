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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('cif')->unique();
            $table->string('nombre');
            $table->string('telefono');
            $table->string('correo')->unique();
            $table->string('cuenta_corriente');
            $table->string('pais');
            $table->string('moneda');
            $table->decimal('importe_cuota_mensual', 15, 2); // Cambiado a decimal(10, 2)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
