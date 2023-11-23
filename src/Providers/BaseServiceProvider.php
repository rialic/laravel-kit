<?php

namespace Rialic\LaravelKit\Providers;

use Illuminate\Support\ServiceProvider;

class BaseServiceProvider extends ServiceProvider
{
  public function boot() :void
  {
    $this->publishes([__DIR__.'/ValidatorServiceProvider.php' => app_path('Providers/ValidatorServiceProvider.php')], ['laravel-kit', 'kit-provider']);
    $this->publishes([__DIR__.'/RepositoryServiceProvider.php' => app_path('Providers/RepositoryServiceProvider.php')], ['laravel-kit', 'kit-provider']);

    $this->publishes([__DIR__.'/../Validator' => app_path('Validator')], ['laravel-kit', 'kit-validator']);

    $this->publishes([__DIR__.'/../Models' => app_path('Models')], ['laravel-kit', 'kit-model']);

    $this->publishes([__DIR__.'/../migrations' => database_path('migrations')], ['laravel-kit', 'kit-migration']);

    $this->publishes([__DIR__.'/../Traits' => app_path('Traits')], ['laravel-kit', 'kit-repository']);
    $this->publishes([__DIR__.'/../Repository' => app_path('Repository')], ['laravel-kit', 'kit-repository']);
    $this->publishes([__DIR__.'/../Exceptions' => app_path('Exceptions')], ['laravel-kit', 'kit-repository']);
    $this->publishes([__DIR__.'/../Helpers' => app_path('Helpers')], ['laravel-kit', 'kit-repository']);
    $this->publishes([__DIR__.'/../Service' => app_path('Service')], ['laravel-kit', 'kit-repository']);
  }

  public function register() :void
  {
    //
  }
}
