<?php

namespace App\Repositories\implementation;

use App\DTO\UserDTO;
use App\Models\Employee;
use App\Models\User;
use App\Repositories\interface\UserRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\UnauthorizedException;


class UserRepository  implements UserRepositoryInterface
{
    public function all()
    {
        return User::where('role', '!=', 'Gerant')->orderBy('created_at', 'desc')->get();
    }

    public function store(UserDTO $DTO)
    {
        try {
            if ($DTO->role === \App\Enums\RoleEnum::TECHNICIAN->value || $DTO->role === \App\Enums\RoleEnum::MAGAZINIER->value) {
                $user = Employee::create($this->getArr($DTO));
            } else {
                throw new \InvalidArgumentException("Invalid user role: {$DTO->role}");
            }
            return $user;
        } catch (\Exception $e) {
            throw new \RuntimeException("Error creating user: " . $e->getMessage());
        }
    }

    public function show(User $user)
    {
        try {
            return $user;
        } catch (ModelNotFoundException $e) {
            throw new \RuntimeException("User not found: " . $e->getMessage(), $e->getCode(), $e);
        }
    }

    public function update(User $user, UserDTO $DTO)
    {
        try {
            return $user->update($this->getArr($DTO));
        } catch (ModelNotFoundException $e) {
            throw new \RuntimeException("User not found: " . $e->getMessage(), $e->getCode(), $e);
        } catch (UnauthorizedException $e) {
            throw new \RuntimeException("Validation error: " . $e->getMessage(), $e->getCode(), $e);
        }
    }

    public function delete(User $user)
    {
        try {
            return $user->delete();
        } catch (ModelNotFoundException $e) {
            throw new \RuntimeException("User not found: " . $e->getMessage(), $e->getCode(), $e);
        }
    }

    private function getArr(UserDTO $DTO): array
    {
        return [
            "name" => $DTO->name,
            "email" => $DTO->email,
            "password" => $DTO->password,
            "role" => $DTO->role,
        ];
    }
}
