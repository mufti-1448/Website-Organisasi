<?php

use App\Http\Middleware\RoleMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Symfony\Component\Routing\Exception\RouteNotFoundException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {

    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->render(function (RouteNotFoundException $e, Request $request) {
            // Cek pesan error, khusus untuk Route [login] not defined
            if (str_contains($e->getMessage(), 'Route [login] not defined')) {
                // Tampilkan halaman error custom dengan status 404
                return response()->view('error.route_not_found', [], 404);
            }
            return null;
        });
    })->create();
