<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Report;
use App\Enums\RoleEnum;
use Illuminate\Auth\Access\Response;

class ReportPolicy
{
    public function create(User $user): bool
    {
        return $user->role == RoleEnum::MAGAZINIER->value || $user->role == RoleEnum::TECHNICIAN->value;
    }
}
