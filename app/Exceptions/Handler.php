<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use App\Exceptions\NotFoundHttpException;
use App\Exceptions\ForbiddenHttpException;
use App\Exceptions\InternalServerErrorException;
use App\Exceptions\SessionExpiredException;
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
        if ($exception instanceof NotFoundHttpException) {
            return response()->view('errors.404', [], 404);
        }

        if ($exception instanceof ForbiddenHttpException) {
            return response()->view('errors.403', [], 403);
        }

        if ($exception instanceof InternalServerErrorException) {
            return response()->view('errors.500', [], 500);
        }

        if ($exception instanceof SessionExpiredException) {
            return response()->view('errors.419', [], 419);
        }

        return parent::render($request, $exception);
    }
}