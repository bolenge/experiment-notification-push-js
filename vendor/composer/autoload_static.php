<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb7bbc1b71197b0046133a8f045ad11e0
{
    public static $files = array (
        'da0eb8ff4f3c4b818d3e710e0d157ae6' => __DIR__ . '/..' . '/ekolobuilder/ekolo/src/Functions/Helpers.php',
    );

    public static $prefixLengthsPsr4 = array (
        'E' => 
        array (
            'Ekolo\\Routing\\' => 14,
            'Ekolo\\Http\\' => 11,
            'Ekolo\\EkoMagic\\' => 15,
            'Ekolo\\Builder\\' => 14,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Ekolo\\Routing\\' => 
        array (
            0 => __DIR__ . '/..' . '/ekolobuilder/eko-routing/src',
        ),
        'Ekolo\\Http\\' => 
        array (
            0 => __DIR__ . '/..' . '/ekolobuilder/eko-http/src',
        ),
        'Ekolo\\EkoMagic\\' => 
        array (
            0 => __DIR__ . '/..' . '/ekolobuilder/eko-magic/src',
        ),
        'Ekolo\\Builder\\' => 
        array (
            0 => __DIR__ . '/..' . '/ekolobuilder/ekolo/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb7bbc1b71197b0046133a8f045ad11e0::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb7bbc1b71197b0046133a8f045ad11e0::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitb7bbc1b71197b0046133a8f045ad11e0::$classMap;

        }, null, ClassLoader::class);
    }
}
