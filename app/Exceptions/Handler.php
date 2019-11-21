<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param Exception $exception
     * @return void
     * @throws Exception
     */
    public function report(Exception $exception): void
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param Exception $exception
     * @return \Illuminate\Http\Response|JsonResponse
     */
    public function render($request, Exception $exception)
    {
        if (! $exception instanceof ValidationException) {
            Log::error($exception->getMessage());
        }

        if ($exception instanceof NotFoundHttpException) {
            return Response::json([
                'status' => 'error',
                'message' => 'Unable to locate resource',
            ]);
        }

        if ($exception instanceof ValidationException) {
            return Response::json([
                'status' => 'error',
                'message' => 'Oops! Validation failed',
                'validationErrors' => $exception->validator->errors(),
            ]);
        }

        return parent::render($request, $exception);
    }
}
