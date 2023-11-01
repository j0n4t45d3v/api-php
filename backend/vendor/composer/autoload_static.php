<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit8d070178755c320c69f93ee4800660ef
{
    public static $files = array (
        'cfe4039aa2a78ca88e07dadb7b1c6126' => __DIR__ . '/../..' . '/config.php',
    );

    public static $prefixLengthsPsr4 = array (
        'D' => 
        array (
            'Desafio\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Desafio\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'Desafio\\Config\\Database' => __DIR__ . '/../..' . '/src/Config/Database.php',
        'Desafio\\Controller\\EmployeeController' => __DIR__ . '/../..' . '/src/Controller/EmployeeController.php',
        'Desafio\\Lib\\Router\\Entities\\Route' => __DIR__ . '/../..' . '/src/Lib/Router/Entities/Route.php',
        'Desafio\\Lib\\Router\\Router' => __DIR__ . '/../..' . '/src/Lib/Router/Router.php',
        'Desafio\\Model\\Employee' => __DIR__ . '/../..' . '/src/Model/Employee.php',
        'Desafio\\Model\\Office' => __DIR__ . '/../..' . '/src/Model/Office.php',
        'Desafio\\Repositories\\ICrudRepository' => __DIR__ . '/../..' . '/src/Repositories/ICrudRepository.php',
        'Desafio\\Repositories\\factory\\CrudFactory' => __DIR__ . '/../..' . '/src/Repositories/factory/CrudFactory.php',
        'Desafio\\Repositories\\implementation\\EmployeeRepositoryImpl' => __DIR__ . '/../..' . '/src/Repositories/implementation/EmployeeRepositoryImpl.php',
        'Desafio\\Repositories\\implementation\\OfficeRepositoryImpl' => __DIR__ . '/../..' . '/src/Repositories/implementation/OfficeRepositoryImpl.php',
        'Desafio\\Service\\EmployeeService' => __DIR__ . '/../..' . '/src/Service/EmployeeService.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit8d070178755c320c69f93ee4800660ef::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit8d070178755c320c69f93ee4800660ef::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit8d070178755c320c69f93ee4800660ef::$classMap;

        }, null, ClassLoader::class);
    }
}