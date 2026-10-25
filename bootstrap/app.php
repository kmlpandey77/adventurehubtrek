<?php

use App\Redirect;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        commands: __DIR__.'/../routes/console.php',
        using: function () {
            // Routes use string "Controller@method" syntax relative to this namespace.
            Route::middleware('web')
                ->namespace('App\Http\Controllers')
                ->group(base_path('routes/web.php'));
        },
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->redirectUsersTo('/administrative');

        $middleware->append(\App\Http\Middleware\SecurityHeaders::class);

        $middleware->alias([
            'uploads.images' => \App\Http\Middleware\RestrictUploads::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        // Send requests for old URLs to their new location, as configured in the admin.
        $exceptions->render(function (Throwable $e, Request $request) {
            try {
                $redirect = Redirect::where('from_url', $request->path())->first();
            } catch (Throwable) {
                return null;
            }

            if ($redirect) {
                return redirect($redirect->to_url);
            }
        });
    })->create();
