<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\CRMs\Contracts\IAmoCrm;
use App\Services\CRMs\AmoCrm;

class AmoCrmServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IAmoCrm::class, AmoCrm::class);
    }
}
