<?php

namespace App\Providers;

use App\Models\Task;
use App\Models\Report;
use App\Models\Disease;
use App\Models\Product;
use App\Models\Program;
use App\Policies\TaskPolicy;
use App\Policies\ReportPolicy;
use App\Policies\DiseasePolicy;
use App\Policies\ProductPolicy;
use App\Policies\ProgramPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::shouldBeStrict();

        Gate::policy(Program::class, ProgramPolicy::class);
        Gate::policy(Product::class, ProductPolicy::class);
        Gate::policy(Disease::class, DiseasePolicy::class);
        Gate::policy(Report::class, ReportPolicy::class);
        Gate::policy(Task::class, TaskPolicy::class);

    }
}
