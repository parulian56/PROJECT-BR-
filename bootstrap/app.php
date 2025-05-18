<?php

use Illuminate\Foundation\Application;
use Spatie\Permission\Middlewares\RoleMiddleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function ($middleware) {
        
        return [
            'web' => [],
            'api' => [],
            'middleware' => [], // global middleware
            'route' => [
                // Middleware bawaan Laravel seperti 'auth' biasanya otomatis
                // Kita tambahkan 'role' dari Spatie
                 $middleware->alias([
                'role' =>  \App\Http\Middleware\RoleMiddleware::class,
                ]),
            ],
         
        ];
    })
    ->withExceptions()
    ->create();
