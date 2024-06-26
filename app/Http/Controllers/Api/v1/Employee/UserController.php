<?php

namespace App\Http\Controllers\Api\v1\Employee;

use App\Models\User;

use App\Http\Requests\StoreUserRequest;
use App\Services\contract\UserServiceInterface;
use App\Http\Controllers\Api\v1\BaseApiController;

class UserController extends BaseApiController
{
    public function __construct(public UserServiceInterface $service)
    {
        
    }

    public function index()
    {
        return $this->sendResponse(
            message: "users list",
            result: $this->service->all()
        );
    }

    public function store(StoreUserRequest $request)
    {
        $user = $this->service->store($request->createDTO());
        return $this->sendResponse(
            message: "user created successfully",
            result: $user,
            code: 201
        );
    }

    public function show(User $user)
    {
        return $this->sendResponse(
            message: "user",
            result: $this->service->show($user),
        );
    }

    public function update(StoreUserRequest $request, User $user)
    {
        $this->service->update($user, $request->createDTO());
        $this->sendResponse(
            message: "user updated successfully",
            code: 204
        );
    }

    public function destroy(User $user)
    {
        $this->service->delete($user);
        $this->sendResponse(
            message: "user deleted successfully",
            code: 204
        );
    }
}
