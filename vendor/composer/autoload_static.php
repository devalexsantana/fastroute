<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita348b708cd48d713c8cae3a17f7ec293
{
    public static $files = array (
        '253c157292f75eb38082b5acb06f3f01' => __DIR__ . '/..' . '/nikic/fast-route/src/functions.php',
    );

    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Src\\' => 4,
        ),
        'F' => 
        array (
            'FastRoute\\' => 10,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Src\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
        'FastRoute\\' => 
        array (
            0 => __DIR__ . '/..' . '/nikic/fast-route/src',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInita348b708cd48d713c8cae3a17f7ec293::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInita348b708cd48d713c8cae3a17f7ec293::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInita348b708cd48d713c8cae3a17f7ec293::$classMap;

        }, null, ClassLoader::class);
    }
}
