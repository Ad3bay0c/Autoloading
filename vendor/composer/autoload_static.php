<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb0b4b0c017773c94c00e1f0ee481a67e
{
    public static $files = array (
        'f65a45394fc1855ea105aee1779ca0e5' => __DIR__ . '/../..' . '/App/function.php',
    );

    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\Library\\' => 12,
            'App\\Config\\' => 11,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\Library\\' => 
        array (
            0 => __DIR__ . '/../..' . '/App/Library',
        ),
        'App\\Config\\' => 
        array (
            0 => __DIR__ . '/../..' . '/App/Config',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb0b4b0c017773c94c00e1f0ee481a67e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb0b4b0c017773c94c00e1f0ee481a67e::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitb0b4b0c017773c94c00e1f0ee481a67e::$classMap;

        }, null, ClassLoader::class);
    }
}
