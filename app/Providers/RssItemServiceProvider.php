<?php

namespace App\Providers;

use App\Repository\RssItemModelRepository;
use App\Repository\RssItemRepository;
use Illuminate\Support\ServiceProvider;

class RssItemServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(RssItemRepository::class, function (): RssItemModelRepository {
            return new RssItemModelRepository;
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
