<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Implementation\TaskService;
use App\Services\Implementation\UserService;
use App\Services\Implementation\ReportService;
use App\Services\contract\TaskServiceInterface;
use App\Services\contract\UserServiceInterface;
use App\Services\Implementation\DiseaseService;
use App\Services\Implementation\ProductService;
use App\Services\contract\ReportServiceInterface;
use App\Services\contract\DiseaseServiceInterface;
use App\Services\contract\ProductServiceInterface;
use App\Services\Implementation\TraitementService;
use App\Services\contract\TraitementServiceInterface;

class ServiceServiceProvider extends ServiceProvider
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
        app()->bind(TaskServiceInterface::class, TaskService::class);
        app()->bind(DiseaseServiceInterface::class, DiseaseService::class);
        app()->bind(ReportServiceInterface::class, ReportService::class);
        app()->bind(TraitementServiceInterface::class, TraitementService::class);
        app()->bind(ProductServiceInterface::class, ProductService::class);
        app()->bind(UserServiceInterface::class, UserService::class);


    }
}
