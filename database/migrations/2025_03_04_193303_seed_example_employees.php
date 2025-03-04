<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Employee;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Employee::insert([
            [
                'dni' => '12345678A',
                'nombre' => 'Empleado 1',
                'correo' => 'empleado1@example.com',
                'telefono' => '600123456',
                'direccion' => 'Calle Falsa 123',
                'fecha_alta' => '2025-01-01',
                'tipo' => 'operario',
            ],
            [
                'dni' => '87654321B',
                'nombre' => 'Empleado 2',
                'correo' => 'empleado2@example.com',
                'telefono' => '600654321',
                'direccion' => 'Avenida Siempre Viva 742',
                'fecha_alta' => '2025-02-01',
                'tipo' => 'administrador',
            ],
            [
                'dni' => '11223344C',
                'nombre' => 'Empleado 3',
                'correo' => 'empleado3@example.com',
                'telefono' => '600112233',
                'direccion' => 'Calle Luna 45',
                'fecha_alta' => '2025-03-01',
                'tipo' => 'operario',
            ],
            [
                'dni' => '44332211D',
                'nombre' => 'Empleado 4',
                'correo' => 'empleado4@example.com',
                'telefono' => '600443322',
                'direccion' => 'Calle Sol 67',
                'fecha_alta' => '2025-04-01',
                'tipo' => 'administrador',
            ],
            [
                'dni' => '55667788E',
                'nombre' => 'Empleado 5',
                'correo' => 'empleado5@example.com',
                'telefono' => '600556677',
                'direccion' => 'Calle Estrella 89',
                'fecha_alta' => '2025-05-01',
                'tipo' => 'operario',
            ],
            [
                'dni' => '99887766F',
                'nombre' => 'Empleado 6',
                'correo' => 'empleado6@example.com',
                'telefono' => '600998877',
                'direccion' => 'Calle Cometa 101',
                'fecha_alta' => '2025-06-01',
                'tipo' => 'administrador',
            ],
            [
                'dni' => '22334455G',
                'nombre' => 'Empleado 7',
                'correo' => 'empleado7@example.com',
                'telefono' => '600223344',
                'direccion' => 'Calle Planeta 202',
                'fecha_alta' => '2025-07-01',
                'tipo' => 'operario',
            ],
            [
                'dni' => '66778899H',
                'nombre' => 'Empleado 8',
                'correo' => 'empleado8@example.com',
                'telefono' => '600667788',
                'direccion' => 'Calle Galaxia 303',
                'fecha_alta' => '2025-08-01',
                'tipo' => 'administrador',
            ],
            [
                'dni' => '33445566I',
                'nombre' => 'Empleado 9',
                'correo' => 'empleado9@example.com',
                'telefono' => '600334455',
                'direccion' => 'Calle Universo 404',
                'fecha_alta' => '2025-09-01',
                'tipo' => 'operario',
            ],
            [
                'dni' => '77889900J',
                'nombre' => 'Empleado 10',
                'correo' => 'empleado10@example.com',
                'telefono' => '600778899',
                'direccion' => 'Calle Constelación 505',
                'fecha_alta' => '2025-10-01',
                'tipo' => 'administrador',
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Employee::where('correo', 'like', '%@example.com')->delete();
    }
};
