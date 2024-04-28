<?php

namespace App\Policies;

use App\Models\User;
use App\Enums\RoleEnum;
use App\Models\Product;
use Illuminate\Auth\Access\Response;

class ProductPolicy
{
    public function create(User $user): bool
    {
        return $user->role == RoleEnum::MAGAZINIER->value;
    }
    public function update(User $user): bool
    {
        return $user->role == RoleEnum::MAGAZINIER->value;
    }
    public function delete(User $user): bool
    {
        return $user->role == RoleEnum::MAGAZINIER->value;
    }
}
