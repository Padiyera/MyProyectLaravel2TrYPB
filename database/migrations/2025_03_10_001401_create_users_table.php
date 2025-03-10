<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        User::insert([
            [
                'name' => 'operario',
                'email' => 'operario@gmail.com',
                'password' => bcrypt('operario'),
                'email_verified_at' => now(),
            ],
            [
                'name' => 'operario6',
                'email' => 'operario6@gmail.com',
                'password' => bcrypt('operario'),
                'email_verified_at' => now(),
            ],
            [
                'name' => 'operario3',
                'email' => 'operario3@gmail.com',
                'password' => bcrypt('operario'),
                'email_verified_at' => now(),
            ],
            [
                'name' => 'operario4',
                'email' => 'operario4@gmail.com',
                'password' => bcrypt('operario'),
                'email_verified_at' => now(),
            ],
            [
                'name' => 'operario5',
                'email' => 'operario5@gmail.com',
                'password' => bcrypt('operario'),
                'email_verified_at' => now(),
            ],
        ]);
    }

   
};