<?php

namespace Eclair;
use Eclair\Support\ServiceProvider;

class Application
{
    private $providers = [];

    public function __construct($providers = [])
    {
        $this->providers = $providers;
        array_walk($this->providers, function ($provider) {
            $provider::register();
        });
    }

    public function boot()
    {
        array_walk($this->providers, function ($provider) {
            $provider::boot();
        });
    }
}