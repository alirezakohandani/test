<?php

namespace App\Exceptions;

use BadMethodCallException;
use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

use function Psy\debug;

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
     * @param  \Exception  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Exception
     */
    public function render($request, Exception $exception)
    {
        dd($exception);
    
        if ($exception instanceof \Illuminate\Database\Eloquent\ModelNotFoundException) {
            return response()->json([
                'message' => 'post not found',
            ], 404);
        }
        
        if ($exception instanceof BadMethodCallException) {
            return response()->json([
                'message' => 'please check your form data',
            ]);
        }
        return parent::render($request, $exception);
    }
}
