<?php

namespace App\Services\contract;

use App\DTO\UserDTO;
use App\Models\User;

interface UserServiceInterface
{
    public function all();

    public function show(User $user);

    public function store(UserDTO $DTO);

    public function update(User $user, UserDTO $DTO);

    public function delete(User $user);

}
