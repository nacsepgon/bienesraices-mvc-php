<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitd3c7aaf8e27b568e0572bd61e4b32e9c
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInitd3c7aaf8e27b568e0572bd61e4b32e9c', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitd3c7aaf8e27b568e0572bd61e4b32e9c', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitd3c7aaf8e27b568e0572bd61e4b32e9c::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
