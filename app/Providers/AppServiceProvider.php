<?php

namespace App\Providers;

use App\Repositories\Concrete\TemplateRepository;
use App\Repositories\Contracts\TemplateRepositoryContract;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(TemplateRepositoryContract::class, TemplateRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
