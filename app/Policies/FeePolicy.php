<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Fee;
use Illuminate\Auth\Access\Response;

class FeePolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('ver fees');
    }

    public function view(User $user, Fee $fee): bool
    {
        return $user->can('ver fees');
    }

    public function create(User $user): bool
    {
        return $user->can('crear fees');
    }

    public function update(User $user, Fee $fee): bool
    {
        return $user->can('editar fees');
    }

    public function delete(User $user, Fee $fee): bool
    {
        return $user->can('eliminar fees');
    }

    public function restore(User $user, Fee $fee): bool
    {
        return false;
    }

    public function forceDelete(User $user, Fee $fee): bool
    {
        return false;
    }
}