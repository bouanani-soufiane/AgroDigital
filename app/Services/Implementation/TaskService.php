<?php

namespace App\Services\Implementation;

use App\DTO\TaskDTO;
use App\Models\Task;
use App\Http\Resources\TaskResource;
use App\Services\contract\TaskServiceInterface;
use App\Repositories\interface\TaskRepositoryInterface;

class TaskService implements TaskServiceInterface
{
    public function __construct(public TaskRepositoryInterface $repository)
    {
    }

    public function all()
    {
        return TaskResource::collection($this->repository->all());
    }



    public function store(TaskDTO $DTO)
    {
        return new TaskResource($this->repository->store($DTO));
    }

    public function show(Task $task)
    {
        return new TaskResource($this->repository->show($task));
    }
    public function update(Task $task, TaskDTO $DTO)
    {
        return $this->repository->update($task, $DTO);
    }
    public function delete(Task $task)
    {
        return $this->repository->delete($task);
    }
}
