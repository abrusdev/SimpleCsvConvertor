<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit10cc00908c00a33b9eff7717ad0b600e
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'Asan\\PHPExcel\\' => 14,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Asan\\PHPExcel\\' => 
        array (
            0 => __DIR__ . '/..' . '/asan/phpexcel/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit10cc00908c00a33b9eff7717ad0b600e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit10cc00908c00a33b9eff7717ad0b600e::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit10cc00908c00a33b9eff7717ad0b600e::$classMap;

        }, null, ClassLoader::class);
    }
}
