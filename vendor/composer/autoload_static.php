<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit38573510afd61680aef836af9d1adc16
{
    public static $prefixLengthsPsr4 = array (
        's' => 
        array (
            'se\\' => 3,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'se\\' => 
        array (
            0 => __DIR__ . '/../..' . '/',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit38573510afd61680aef836af9d1adc16::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit38573510afd61680aef836af9d1adc16::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
