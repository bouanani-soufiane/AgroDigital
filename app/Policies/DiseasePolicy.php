<?php

namespace App\Policies;

use App\Models\User;
use App\Enums\RoleEnum;
use App\Models\Disease;
use Illuminate\Auth\Access\Response;

class DiseasePolicy
{
    public function create(User $user): bool
    {
        return $user->role == RoleEnum::TECHNICIAN->value;
    }
    public function update(User $user): bool
    {
        return $user->role == RoleEnum::TECHNICIAN->value;
    }
    public function delete(User $user): bool
    {
        return $user->role == RoleEnum::TECHNICIAN->value;
    }
}
