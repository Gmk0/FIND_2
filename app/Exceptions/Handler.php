<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

use Illuminate\Http\Response;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $exception)
    {
        if ($this->isHttpException($exception) && $exception->getStatusCode() == 500) {
            return redirect()->route('');
        }



        if ($exception instanceof \Symfony\Component\HttpKernel\Exception\NotFoundHttpException) {
            if ($request->expectsJson()) {
                return response()->json(['error' => 'Ressource non trouvée'], Response::HTTP_NOT_FOUND);
            }

            return response()->view('test.errors-404', [], Response::HTTP_NOT_FOUND);
        }

        return parent::render($request, $exception);
    }
}
