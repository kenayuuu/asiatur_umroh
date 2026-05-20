<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->append(\App\Http\Middleware\SetLocale::class);

        // Register role-based middleware aliases
        $middleware->alias([
            'role.pelanggan' => \App\Http\Middleware\IsPelanggan::class,
            'role.content' => \App\Http\Middleware\IsContentAdmin::class,
            'role.operational' => \App\Http\Middleware\IsOperationalAdmin::class,
            'role.leader' => \App\Http\Middleware\IsLeader::class,
            'role.super' => \App\Http\Middleware\IsSuperAdmin::class,
            'role.admin' => \App\Http\Middleware\IsAnyAdmin::class,
        ]);
    })

    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
