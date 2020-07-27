<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\TicketRepositoryInterface;
use App\Repositories\Eloquent\TicketRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(TicketRepositoryInterface::class, TicketRepository::class);
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
