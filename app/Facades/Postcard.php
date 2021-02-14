<?php

namespace App\Facades;

class Postcard
{
    protected static function resolveFacade($name)
    {
        return app()[$name];
    }

    public static function __callStatic($method, $arguments)
    {
        return self::resolveFacade('Postcard')->$method(...$arguments); 
         //hello is in the service class
        //will call the PostCard service in the app service (binded)
    }
}