<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit972b28e65b0bd934cea8868f35ce6dc2
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'App\\libraries\\Core' => __DIR__ . '/../..' . '/app/libraries/Core.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit972b28e65b0bd934cea8868f35ce6dc2::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit972b28e65b0bd934cea8868f35ce6dc2::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit972b28e65b0bd934cea8868f35ce6dc2::$classMap;

        }, null, ClassLoader::class);
    }
}
