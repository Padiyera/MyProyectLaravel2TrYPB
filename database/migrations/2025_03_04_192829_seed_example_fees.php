<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Fee;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Fee::insert([
            [
                'concept' => 'Cuota mensual',
                'issue_date' => '2025-03-01',
                'amount' => 100.00,
                'paid' => false,
                'payment_date' => null,
                'notes' => 'Cuota correspondiente al mes de marzo',
            ],
            [
                'concept' => 'Cuota mensual',
                'issue_date' => '2025-02-01',
                'amount' => 100.00,
                'paid' => true,
                'payment_date' => '2025-02-15',
                'notes' => 'Cuota correspondiente al mes de febrero',
            ],
            [
                'concept' => 'Cuota anual',
                'issue_date' => '2025-01-01',
                'amount' => 1200.00,
                'paid' => true,
                'payment_date' => '2025-01-10',
                'notes' => 'Cuota correspondiente al año 2025',
            ],
            [
                'concept' => 'Cuota mensual',
                'issue_date' => '2025-01-01',
                'amount' => 100.00,
                'paid' => true,
                'payment_date' => '2025-01-15',
                'notes' => 'Cuota correspondiente al mes de enero',
            ],
            [
                'concept' => 'Cuota mensual',
                'issue_date' => '2024-12-01',
                'amount' => 100.00,
                'paid' => true,
                'payment_date' => '2024-12-15',
                'notes' => 'Cuota correspondiente al mes de diciembre',
            ],
            [
                'concept' => 'Cuota mensual',
                'issue_date' => '2024-11-01',
                'amount' => 100.00,
                'paid' => true,
                'payment_date' => '2024-11-15',
                'notes' => 'Cuota correspondiente al mes de noviembre',
            ],
            [
                'concept' => 'Cuota mensual',
                'issue_date' => '2024-10-01',
                'amount' => 100.00,
                'paid' => true,
                'payment_date' => '2024-10-15',
                'notes' => 'Cuota correspondiente al mes de octubre',
            ],
            [
                'concept' => 'Cuota mensual',
                'issue_date' => '2024-09-01',
                'amount' => 100.00,
                'paid' => true,
                'payment_date' => '2024-09-15',
                'notes' => 'Cuota correspondiente al mes de septiembre',
            ],
            [
                'concept' => 'Cuota mensual',
                'issue_date' => '2024-08-01',
                'amount' => 100.00,
                'paid' => true,
                'payment_date' => '2024-08-15',
                'notes' => 'Cuota correspondiente al mes de agosto',
            ],
            [
                'concept' => 'Cuota mensual',
                'issue_date' => '2024-07-01',
                'amount' => 100.00,
                'paid' => true,
                'payment_date' => '2024-07-15',
                'notes' => 'Cuota correspondiente al mes de julio',
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Fee::where('issue_date', '>=', '2024-07-01')->delete();
    }
};
