<?php

namespace App\Repositories\interface;
use App\DTO\UserDTO;
use App\Models\User;
interface UserRepositoryInterface
{
    public function all();

    public function store(UserDTO $DTO);

    public function show(User $user);

    public function update(User $user, UserDTO $DTO);

    public function delete(User $user);
}
