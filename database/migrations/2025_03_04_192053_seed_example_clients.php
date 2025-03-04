<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Client;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Client::insert([
            [
                'cif' => 'A12345678',
                'nombre' => 'Cliente 1',
                'telefono' => '123456789',
                'correo' => 'cliente1@example.com',
                'cuenta_corriente' => 'ES1234567890123456789012',
                'pais' => 'España',
                'moneda' => 'EUR',
                'importe_cuota_mensual' => 100.00,
            ],
            [
                'cif' => 'B87654321',
                'nombre' => 'Cliente 2',
                'telefono' => '987654321',
                'correo' => 'cliente2@example.com',
                'cuenta_corriente' => 'ES2109876543210987654321',
                'pais' => 'España',
                'moneda' => 'EUR',
                'importe_cuota_mensual' => 200.00,
            ],
            [
                'cif' => 'C12345678',
                'nombre' => 'Cliente 3',
                'telefono' => '123123123',
                'correo' => 'cliente3@example.com',
                'cuenta_corriente' => 'ES1231231231231231231231',
                'pais' => 'España',
                'moneda' => 'EUR',
                'importe_cuota_mensual' => 150.00,
            ],
            [
                'cif' => 'D87654321',
                'nombre' => 'Cliente 4',
                'telefono' => '321321321',
                'correo' => 'cliente4@example.com',
                'cuenta_corriente' => 'ES3213213213213213213213',
                'pais' => 'España',
                'moneda' => 'EUR',
                'importe_cuota_mensual' => 250.00,
            ],
            [
                'cif' => 'E12345678',
                'nombre' => 'Cliente 5',
                'telefono' => '456456456',
                'correo' => 'cliente5@example.com',
                'cuenta_corriente' => 'ES4564564564564564564564',
                'pais' => 'España',
                'moneda' => 'EUR',
                'importe_cuota_mensual' => 300.00,
            ],
            [
                'cif' => 'F87654321',
                'nombre' => 'Cliente 6',
                'telefono' => '654654654',
                'correo' => 'cliente6@example.com',
                'cuenta_corriente' => 'ES6546546546546546546546',
                'pais' => 'España',
                'moneda' => 'EUR',
                'importe_cuota_mensual' => 350.00,
            ],
            [
                'cif' => 'G12345678',
                'nombre' => 'Cliente 7',
                'telefono' => '789789789',
                'correo' => 'cliente7@example.com',
                'cuenta_corriente' => 'ES7897897897897897897897',
                'pais' => 'España',
                'moneda' => 'EUR',
                'importe_cuota_mensual' => 400.00,
            ],
            [
                'cif' => 'H87654321',
                'nombre' => 'Cliente 8',
                'telefono' => '987987987',
                'correo' => 'cliente8@example.com',
                'cuenta_corriente' => 'ES9879879879879879879879',
                'pais' => 'España',
                'moneda' => 'EUR',
                'importe_cuota_mensual' => 450.00,
            ],
            [
                'cif' => 'I12345678',
                'nombre' => 'Cliente 9',
                'telefono' => '111222333',
                'correo' => 'cliente9@example.com',
                'cuenta_corriente' => 'ES1112223334445556667778',
                'pais' => 'España',
                'moneda' => 'EUR',
                'importe_cuota_mensual' => 500.00,
            ],
            [
                'cif' => 'J87654321',
                'nombre' => 'Cliente 10',
                'telefono' => '999888777',
                'correo' => 'cliente10@example.com',
                'cuenta_corriente' => 'ES9998887776665554443332',
                'pais' => 'España',
                'moneda' => 'EUR',
                'importe_cuota_mensual' => 550.00,
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Client::where('correo', 'like', '%@example.com')->delete();
    }
};
