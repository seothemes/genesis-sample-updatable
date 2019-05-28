<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit4ac99c4ece88b6dc5c7835e8167e4ce1
{
    public static $files = array (
        'a3c4d07de71958e11890e8ef31ff64ee' => __DIR__ . '/..' . '/seothemes/child-theme-updater/child-theme-updater.php',
        '89ff252b349d4d088742a09c25f5dd74' => __DIR__ . '/..' . '/yahnis-elsts/plugin-update-checker/plugin-update-checker.php',
    );

    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Composer\\Installers\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Composer\\Installers\\' => 
        array (
            0 => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit4ac99c4ece88b6dc5c7835e8167e4ce1::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit4ac99c4ece88b6dc5c7835e8167e4ce1::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}