<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\implementation\TaskRepository;
use App\Repositories\implementation\UserRepository;
use App\Repositories\implementation\ReportRepository;
use App\Repositories\implementation\DiseaseRepository;
use App\Repositories\implementation\ProductRepository;
use App\Repositories\implementation\MaterialRepository;
use App\Repositories\interface\TaskRepositoryInterface;
use App\Repositories\interface\UserRepositoryInterface;
use App\Repositories\implementation\TraitementRepository;
use App\Repositories\interface\ReportRepositoryInterface;
use App\Repositories\interface\DiseaseRepositoryInterface;
use App\Repositories\interface\ProductRepositoryInterface;
use App\Repositories\interface\MaterialRepositoryInterface;
use App\Repositories\interface\TraitementRepositoryInterface;

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
        app()->bind(DiseaseRepositoryInterface::class, DiseaseRepository::class);
        app()->bind(ReportRepositoryInterface::class, ReportRepository::class);
        app()->bind(TraitementRepositoryInterface::class, TraitementRepository::class);
        app()->bind(ProductRepositoryInterface::class, ProductRepository::class);
        app()->bind(UserRepositoryInterface::class, UserRepository::class);
        app()->bind(MaterialRepositoryInterface::class, MaterialRepository::class);

    }
}
