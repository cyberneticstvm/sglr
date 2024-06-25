<?php

use App\Http\Middleware\AdminUser;
use App\Http\Middleware\Approver;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\PublicUser;
use App\Http\Middleware\Staff;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        /*$middleware->append([
            AdminUser::class,
            Staff::class
        ]);
        $middleware->append(Approver::class);
        $middleware->append(PublicUser::class);*/

        $middleware->appendToGroup('admin-group', [
            AdminUser::class,
            Staff::class,
        ]);

        $middleware->alias([
            'admin' => AdminUser::class,
            'staff' => AdminUser::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->renderable(function (NotFoundHttpException $e) {
            return redirect()->back()->with('error', 'Requested record not found / deleted!');
        });
    })->create();
