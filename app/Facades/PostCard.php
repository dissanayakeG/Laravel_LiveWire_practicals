<?php


namespace App\Facades;


class PostCard
{

    public static function facadeResolver($name)
    {
        return app()[$name]; //return EmailService object
        //this throw error hello does not exist, lets create hello in EmailService class and bind it in serviceProvider
    }

    public static function __callStatic($method, $arguments)
    {
        return self::facadeResolver('PostCardSingleton')->$method(...$arguments);
    }
}
