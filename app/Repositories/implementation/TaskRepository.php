<?php

namespace App\Repositories\implementation;

use App\Models\Task;
use App\Repositories\interface\TaskRepositoryInterface;
use App\DTO\TaskDTO;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\UnauthorizedException;
use Tymon\JWTAuth\Facades\JWTAuth;

class TaskRepository implements TaskRepositoryInterface
{
    public function all(): Collection
    {
        return Task::all();
    }
    public function EmployeeTask(): Collection
    {
        try {
            return Task::where('employee_id', JWTAuth::user()->id)->get();
        } catch (\Exception $e) {
            throw new \RuntimeException("Error showing task: " . $e->getMessage());
        }
    }

    public function store(TaskDTO $DTO): Task
    {

        try {
            $task = Task::create($this->getArr($DTO));
            return $task;
        } catch (\Exception $e) {
            throw new \RuntimeException("Error creating task: " . $e->getMessage());
        }
    }

    public function show(Task $task): Task
    {
        try {
            return $task;
        } catch (ModelNotFoundException $e) {
            throw new \RuntimeException("User not found: " . $e->getMessage(), $e->getCode(), $e);
        }
    }

    public function update(Task $task, TaskDTO $DTO)
    {
        try {
            $task->update($this->getArr($DTO));
            return $task;
        } catch (ModelNotFoundException $e) {
            throw new \RuntimeException("Task not found: " . $e->getMessage(), $e->getCode(), $e);
        } catch (UnauthorizedException $e) {
            throw new \RuntimeException("Validation error: " . $e->getMessage(), $e->getCode(), $e);
        }
    }

    public function markAsDone(Task $task)
    {
        try {
            $task->update(['Status' => 'Done']);
            return $task;
        } catch (ModelNotFoundException $e) {
            throw new \RuntimeException("Task not found: " . $e->getMessage(), $e->getCode(), $e);
        } catch (UnauthorizedException $e) {
            throw new \RuntimeException("Validation error: " . $e->getMessage(), $e->getCode(), $e);
        }
    }
    public function markAsCancelled(Task $task)
    {
        try {
            $task->update(['Status' => 'Cancelled']);
            return $task;
        } catch (ModelNotFoundException $e) {
            throw new \RuntimeException("Task not found: " . $e->getMessage(), $e->getCode(), $e);
        } catch (UnauthorizedException $e) {
            throw new \RuntimeException("Validation error: " . $e->getMessage(), $e->getCode(), $e);
        }
    }

    public function delete(Task $task)
    {
        try {
            return $task->delete();
        } catch (ModelNotFoundException $e) {
            throw new \RuntimeException("Task not found: " . $e->getMessage(), $e->getCode(), $e);
        }
    }

    private function getArr(TaskDTO $DTO): array
    {
        return [
            "name" => $DTO->name,
            'Description'  => $DTO->Description,
            'DateStart'  => $DTO->DateStart,
            'DateEnd'  => $DTO->DateEnd,
            'Status'  => $DTO->Status,
            'TypeTask'  => $DTO->TypeTask,
            "employee_id" => $DTO->employee_id,

        ];
    }
}
