<?php

declare(strict_types=1);

namespace Jubeki\AlpineAnimations;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class AlpineAnimationsServiceProvider extends BaseServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'alpine-animations');
    }
}
