<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Client;
use Illuminate\Auth\Access\Response;

class ClientPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('ver clientes');
    }

    public function view(User $user): bool
    {
        return $user->can('ver clientes');
    }

    public function create(User $user): bool
    {
        return $user->can('crear clientes');
    }

    public function update(User $user): bool
    {
        return $user->can('editar clientes');
    }

    public function delete(User $user): bool
    {
        return $user->can('eliminar clientes');
    }

    public function restore(User $user): bool
    {
        return false;
    }

    public function forceDelete(User $usert): bool
    {
        return false;
    }
}