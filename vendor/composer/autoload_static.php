<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit4c7265e7b681f8c9da896dc180b1be8e
{
    public static $files = array (
        'cfe4039aa2a78ca88e07dadb7b1c6126' => __DIR__ . '/../..' . '/config.php',
        'f576a663328a09c6d11002c1d4360beb' => __DIR__ . '/../..' . '/libraries/payments/PaymentsBase.php',
    );

    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Stripe\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Stripe\\' => 
        array (
            0 => __DIR__ . '/..' . '/stripe/stripe-php/lib',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'Model' => __DIR__ . '/../..' . '/models/Model.php',
        'Order' => __DIR__ . '/../..' . '/models/Order.php',
        'Products' => __DIR__ . '/../..' . '/models/Products.php',
        'Users' => __DIR__ . '/../..' . '/models/Users.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit4c7265e7b681f8c9da896dc180b1be8e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit4c7265e7b681f8c9da896dc180b1be8e::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit4c7265e7b681f8c9da896dc180b1be8e::$classMap;

        }, null, ClassLoader::class);
    }
}
