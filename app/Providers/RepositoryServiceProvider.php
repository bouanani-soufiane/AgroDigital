<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\implementation\TaskRepository;
use App\Repositories\interface\TaskRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        app()->bind(TaskRepositoryInterface::class, TaskRepository::class);
    }
}
