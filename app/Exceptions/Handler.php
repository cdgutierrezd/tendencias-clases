<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    protected $dontReport = [
        //
    ];

    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $exception)
    {
        // Error 404 - Página no encontrada
        if ($exception instanceof NotFoundHttpException) {
            return response()->view('errors.404', [], 404);
        }

        // Error 403 - Acceso denegado
        if ($exception instanceof AccessDeniedHttpException) {
            return response()->view('errors.403', [], 403);
        }

        // Error 500 - Error del servidor
        if ($exception instanceof HttpException && $exception->getStatusCode() == 500) {
            return response()->view('errors.500', [], 500);
        }

        // Error 419 - Sesión expirada (CSRF)
        if ($exception instanceof \Illuminate\Session\TokenMismatchException) {
            return response()->view('errors.419', [], 419);
        }

        // Error 503 - Servicio no disponible
        if ($exception instanceof HttpException && $exception->getStatusCode() == 503) {
            return response()->view('errors.503', [], 503);
        }

        return parent::render($request, $exception);
    }
}