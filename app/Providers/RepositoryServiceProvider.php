<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\GalleryRepository;
use App\Repositories\Interfaces\GalleryRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            GalleryRepositoryInterface::class, 
            GalleryRepository::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
