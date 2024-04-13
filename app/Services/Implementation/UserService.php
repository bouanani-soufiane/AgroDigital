<?php

namespace App\Services\Implementation;

use App\DTO\UserDTO;
use App\Models\User;
use App\Http\Resources\UserResource;
use App\Services\contract\UserServiceInterface;
use App\Repositories\interface\UserRepositoryInterface;

class UserService implements UserServiceInterface
{

  public function __construct(
        public UserRepositoryInterface $repository
    ){}

    public function all()
    {
        return UserResource::collection($this->repository->all());
    }

    public function show(User $user)
    {
        return new UserResource($this->repository->show($user));
    }

    public function store(UserDTO $DTO)
    {
        return new UserResource($this->repository->store($DTO));
    }

    public function update(User $user, UserDTO $DTO)
    {
        return $this->repository->update($user, $DTO);
    }

    public function delete(User $user)
    {
        return $this->repository->delete($user);
    }
}
