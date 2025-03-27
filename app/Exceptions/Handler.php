<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Database\QueryException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Http\Response; // A helyes Response osztály használata

class Handler extends ExceptionHandler
{
    public function render($request, Throwable $exception): Response
    {
        if ($exception instanceof QueryException) {
            return response()->view('errors.database', [], 500);
        }

        if ($exception instanceof NotFoundHttpException) {
            return response()->view('errors.404', [], 404);
        }
        if ($exception instanceof NotFoundHttpException) {
            return response()->view('errors.403', [], 403);
        }
        

        return parent::render($request, $exception);
    }
}
