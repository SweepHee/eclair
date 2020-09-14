<?php

namespace Eclair\Routing;

abstract class Middleware
{
    abstract public static function process();
}