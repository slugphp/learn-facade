<?php

require_once __DIR__ . '/model.php';

class User extends Facade
{
    protected static function getFacadeAccessor()
    {
        $instanceKey = 'user';
        if (!isset(self::$resolvedInstance[$instanceKey])) {
            $user = new Model\TestModel\User();
            self::$resolvedInstance[$instanceKey] = $user;
        }
        return $instanceKey;
    }
}

/**
 * A simple Facade Class, From Illuminate\Support\Facades\Facade
 */
abstract class Facade
{
    /**
     * The resolved object instances.
     *
     * @var array
     */
    protected static $resolvedInstance;

    /**
     * Get the registered name of the component.
     *
     * @return string
     *
     * @throws \RuntimeException
     */
    protected static function getFacadeAccessor()
    {
        throw new RuntimeException('Facade does not implement getFacadeAccessor method.');
    }

    /**
     * Handle dynamic, static calls to the object.
     *
     * @param  string  $method
     * @param  array   $args
     * @return mixed
     *
     * @throws \RuntimeException
     */
    public static function __callStatic($method, $args)
    {
        $instanceKey = static::getFacadeAccessor();
        $instance = self::$resolvedInstance[$instanceKey];

        if (! $instance) {
            throw new RuntimeException('A facade root has not been set.');
        }

        return $instance->$method(...$args);
    }
}