<?php

namespace App\Policies;

use App\Models\Task;
use App\Models\User;
use App\Enums\RoleEnum;
use Illuminate\Auth\Access\Response;

class TaskPolicy
{
  
    public function update(User $user): bool
    {
        return $user->role == RoleEnum::GERANT->value;
    }
    public function delete(User $user): bool
    {
        return $user->role == RoleEnum::GERANT->value;
    }
}
