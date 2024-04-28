<?php

namespace App\Http\Controllers\Api\v1;

use App\DTO\TaskDTO;
use App\Models\Task;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Services\contract\TaskServiceInterface;
use App\Http\Controllers\Api\v1\BaseApiController;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class TaskController extends BaseApiController
{
    use AuthorizesRequests;

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
    public function EmployeeTask()
    {
        return $this->sendResponse(
            message: "tasks list",
            result: $this->service->EmployeeTask()
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

    public function markAsDone(Task $task)
    {
        $task = $this->service->markAsDone($task);

        return $this->sendResponse(
            message: "task marked as done",
            result: $task->id,
            code: 200
        );
    }

    public function markAsCancelled(Task $task)
    {
        $task = $this->service->markAsCancelled($task);

        return $this->sendResponse(
            message: "task marked as Cancelled",
            result: $task->id,
            code: 200
        );
    }
    public function destroy(Task $task)
    {
        $this->authorize("delete", $task);

        $this->service->delete($task);

        return $this->sendResponse(message: "Task deleted", result: true);
    }
}
