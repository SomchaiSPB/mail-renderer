<?php

namespace App\Providers;

use App\Factories\Concrete\TemplateContextFactory;
use App\Factories\Contracts\TemplateContextFactoryInterface;
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
        $this->app->bind(TemplateContextFactoryInterface::class, TemplateContextFactory::class);
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
