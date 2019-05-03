<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita45daeb5e3b98ef08942a59fbf219993
{
    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'Todo\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Todo\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInita45daeb5e3b98ef08942a59fbf219993::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInita45daeb5e3b98ef08942a59fbf219993::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}