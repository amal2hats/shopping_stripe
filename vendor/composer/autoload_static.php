<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit4c7265e7b681f8c9da896dc180b1be8e
{
    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'Proucts_model' => __DIR__ . '/../..' . '/models/Proucts_model.php',
        'Users_model' => __DIR__ . '/../..' . '/models/Users_model.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit4c7265e7b681f8c9da896dc180b1be8e::$classMap;

        }, null, ClassLoader::class);
    }
}
