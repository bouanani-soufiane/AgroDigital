<?php

namespace App\Services\contract;

use App\DTO\TaskDTO;
use App\Models\Task;

interface TaskServiceInterface
{
    public function all();
    public function EmployeeTask();
    public function store(TaskDTO $DTO);
    public function show(Task $task);
    public function markAsDone(Task $task);
    public function markAsCancelled(Task $task);
    public function update(Task $task, TaskDTO $DTO);
    public function delete(Task $task);
}
