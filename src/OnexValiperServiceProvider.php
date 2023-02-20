<?php

namespace Onex\Valiper;

use Illuminate\Support\ServiceProvider;
use Onex\Valiper\Valiper\ValiperClass;

class OnexValiperServiceProvider extends ServiceProvider
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
        $this->app->bind('valiperclass',function(){
            return new ValiperClass();
        });
    }
}
