<?php

namespace App\Http\Controllers\Api\v1;

use App\DTO\TaskDTO;
use App\Models\Task;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Services\contract\TaskServiceInterface;

class TaskController extends BaseApiController
{
    public function __construct(public TaskServiceInterface $service)
    {
    }

    public function index()
    {
        $tasks = $this->service->all();
        return response()->json($tasks, 200);
    }


    public function store(StoreTaskRequest $request)
    {
        $DTO = TaskDTO::fromRequest($request);
        $task = $this->service->store($DTO);
        return response()->json($task, 201);
    }

    public function show(Task $task)
    {
        return response()->json($task, 200);
    }


    public function update(UpdateTaskRequest $request, Task $task)
    {
        $DTO = TaskDTO::fromRequest($request);
        $task = $this->service->update($task, $DTO);
        return response()->json($task, 200);
    }

    public function destroy(Task $task)
    {
        $this->service->delete($task);

        return response()->json(['message' => 'Task deleted successfully'], 200);
    }
}
