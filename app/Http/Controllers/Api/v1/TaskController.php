<?php

namespace App\Http\Controllers\Api\v1;

use App\DTO\TaskDTO;
use App\Models\Task;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Services\contract\TaskServiceInterface;
use App\Http\Controllers\Api\v1\BaseApiController;

class TaskController extends BaseApiController
{
    public function __construct(public TaskServiceInterface $service)
    {
    }

    public function index()
    {
        return $this->sendResponse(
            message: "tasks list",
            result: $this->service->all()
        );
    }


    public function store(StoreTaskRequest $request)
    {
        $DTO = TaskDTO::fromRequest($request);
        $task = $this->service->store($DTO);
        return $this->sendResponse(
            message: "Task created successfully",
            result: $task,
            code: 201
        );
    }

    public function show(Task $task)
    {
        return $this->sendResponse(
            message: "task retrieved successfully",
            result: $this->service->show($task),
            code: 201
        );
    }


    public function update(UpdateTaskRequest $request, Task $task)
    {
        $DTO = TaskDTO::fromRequest($request);
        $task = $this->service->update($task, $DTO);

        return $this->sendResponse(
            message: "task updated successfully",
            result: $task,
            code: 201
        );
    }

    public function destroy(Task $task)
    {
        $this->service->delete($task);

        return $this->sendResponse(message: "Task deleted", result: true);
    }
}
