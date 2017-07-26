<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitee185f4fa0ca1ce6faae2d5b29cb5155
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Psr\\Log\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/Psr/Log',
        ),
    );

    public static $prefixesPsr0 = array (
        'P' => 
        array (
            'PayMaya' => 
            array (
                0 => __DIR__ . '/..' . '/paymaya/paymaya-sdk/lib',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitee185f4fa0ca1ce6faae2d5b29cb5155::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitee185f4fa0ca1ce6faae2d5b29cb5155::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInitee185f4fa0ca1ce6faae2d5b29cb5155::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}