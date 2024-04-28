<?php

namespace App\Policies;

use App\Models\User;
use App\Enums\RoleEnum;
use App\Models\Program;
use Illuminate\Auth\Access\Response;

class ProgramPolicy
{
    public function create(User $user): bool
    {
        return $user->role == RoleEnum::GERANT->value;
    }

}
