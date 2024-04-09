<?php

namespace App\Services\contract;

use App\DTO\TaskDTO;
use App\Models\Task;

interface TaskServiceInterface
{
    public function all();

    public function store(TaskDTO $DTO);

    public function show(Task $task);
    public function delete(Task $task);


}
