<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*---------------------permisos---------------- */
        Permission::create(['name' => 'ver usuarios']);
        Permission::create(['name' => 'crear usuarios']);
        Permission::create(['name' => 'editar usuarios']);
        Permission::create(['name' => 'eliminar usuarios']);

        Permission::create(['name' => 'ver tareas']);
        Permission::create(['name' => 'crear tareas']);
        Permission::create(['name' => 'editar tareas']);
        Permission::create(['name' => 'eliminar tareas']);

        Permission::create(['name' => 'ver clientes']);
        Permission::create(['name' => 'crear clientes']);
        Permission::create(['name' => 'editar clientes']);
        Permission::create(['name' => 'eliminar clientes']);
        /*---------------------admin---------------- */
        //creo usuario
        $adminUser = User::query()->create([
            'name' => 'admin1',
            'email' => 'admin1@gmail.com',
            'password' => bcrypt('admin'),
            'email_verified_at' => now(),
        ]);
        //creo rol
        $roleAdmin = Role::create(['name' => 'super-admin']);
        //asigno rol a usuario
        $adminUser->assignRole($roleAdmin);
        //obtengo todos los permisos
        $permissionsAdmin = Permission::query()->pluck('name');
        //asigno todos los permisos al rol
        $roleAdmin->syncPermissions($permissionsAdmin);

        /*---------------------operario---------------- */
        $operarioUser = User::query()->create([
            'name' => 'operario1',
            'email' => 'operario1@gmail.com',
            'password' => bcrypt('operario'),
            'email_verified_at' => now(),
        ]);
        $roleOperario = Role::create(['name' => 'operario']);
        $operarioUser->assignRole($roleOperario);
        $roleOperario->syncPermissions(['ver tareas']);  
    }
}
