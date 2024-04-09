<?php

namespace App\Repositories\interface;

use App\DTO\TaskDTO;
use App\Models\Task;


interface TaskRepositoryInterface
{
    public function all();

    public function store(TaskDTO $DTO);

    public function show(Task $task);

    public function update(Task $task, TaskDTO $DTO);

    public function delete(Task $task);
}
