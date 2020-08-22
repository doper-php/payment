<?php

namespace DoperPayment;

class Factory
{
    /**
     * @param string $name
     *
     */
    public static function make($name, array $config)
    {
        $namespace = $name;//Kernel\Support\Str::studly($name);
        $application = "\\Doper\\Payment\\{$namespace}\\Application";

        return new $application($config);
    }

    /**
     * Dynamically pass methods to the application.
     *
     * @param string $name
     * @param array  $arguments
     *
     * @return mixed
     */
    public static function __callStatic($name, $arguments)
    {
        return self::make($name, ...$arguments);
    }
}
