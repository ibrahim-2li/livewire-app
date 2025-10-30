<?php

use App\Http\Middleware\Admin;
use App\Http\Middleware\CheckAdminRole;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Auth\Middleware\RedirectIfAuthenticated;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'admin.role' => CheckAdminRole::class,
        ]);
        $middleware->web(append: [
            \App\Http\Middleware\LanguageManager::class,
        ]);
    })->withMiddleware(function (Middleware $middleware) {
        $middleware->redirectGuestsTo('/admin/login');
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
