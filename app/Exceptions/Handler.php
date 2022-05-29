<?php

namespace App\Exceptions;

use Illuminate\Database\Eloquent\RelationNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

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
     * A list of the inputs that are never flashed for validation exceptions.
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
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  Throwable  $e
     */
    public function render($request, Throwable $e)
    {
        if ($request->wantsJson() && $request->is('api/*')) {
            return $this->handleExceptions($this->prepareException($e));
        }

        return parent::render($request, $e);
    }

    private function handleExceptions(Throwable $exception)
    {
        /**
         * Name: Not Found
         * Code: 404
         * Res: Response::HTTP_NOT_FOUND
         */
        if ($exception instanceof \Symfony\Component\HttpKernel\Exception\NotFoundHttpException) {
            return response()->json([
                                        'status' => 'error',
                                        'status_code' => Response::HTTP_NOT_FOUND,
                                        'message' => __('Not Found'),
                                    ], Response::HTTP_NOT_FOUND, $exception->getHeaders()); // 404
        } /**
         * Name: Unauthorized
         * Code: 401
         * Res: Response::HTTP_UNAUTHORIZED
         */
        elseif (
            $exception instanceof \Illuminate\Auth\AuthenticationException ||
            ($exception instanceof \Symfony\Component\HttpKernel\Exception\HttpException && $exception->getStatusCode() == '401')
        ) {
            return response()->json([
                                        'status' => 'error',
                                        'status_code' => Response::HTTP_UNAUTHORIZED,
                                        'message' => __('Unauthorized or Unauthenticated'),
                                    ], Response::HTTP_UNAUTHORIZED); // 401
        } /**
         * Name: Forbidden
         * Code: 403
         * Res: Response::HTTP_FORBIDDEN
         */
        elseif (($exception instanceof \Symfony\Component\HttpKernel\Exception\HttpException && $exception->getStatusCode() == '403')) {
            return response()->json([
                                        'status' => 'error',
                                        'status_code' => Response::HTTP_FORBIDDEN,
                                        'message' => __($exception->getMessage() ?: 'Forbidden'),
                                    ], Response::HTTP_FORBIDDEN, $exception->getHeaders()); // 403
        } /**
         * Name: Method Not Allowed
         * Code: 405
         * Res: Response::HTTP_METHOD_NOT_ALLOWED
         */
        elseif (
            $exception instanceof \Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException ||
            ($exception instanceof \Symfony\Component\HttpKernel\Exception\HttpException && $exception->getStatusCode() == '405')
        ) {
            return response()->json([
                                        'status' => 'error',
                                        'status_code' => Response::HTTP_METHOD_NOT_ALLOWED,
                                        'message' => __($exception->getMessage() ?: 'Method Not Allowed'),
                                    ], Response::HTTP_METHOD_NOT_ALLOWED, $exception->getHeaders()); // 405
        } /**
         * Name: Unprocessable Entity
         * Code: 422
         * Res: Response::HTTP_UNPROCESSABLE_ENTITY
         */
        elseif (
            $exception instanceof \Illuminate\Validation\ValidationException ||
            ($exception instanceof \Symfony\Component\HttpKernel\Exception\HttpException && $exception->getStatusCode() == '422')
        ) {
            return response()->json([
                                        'status' => 'error',
                                        'status_code' => Response::HTTP_UNPROCESSABLE_ENTITY,
                                        'message' => __($exception->getMessage() ?: 'Unprocessable Entity'),
                                    ], Response::HTTP_UNPROCESSABLE_ENTITY); // 422
        } else {
            if ($exception instanceof RelationNotFoundException) {
                return \response()->json([
                                             'status' => 'error',
                                             'status_code' => '404',
                                             'message' => 'No Relationship Found',
                                         ], 404);
            } /**
             * Name: Too Many Requests
             * Code: 429
             * Res: Response::HTTP_TOO_MANY_REQUESTS
             */
            elseif (
                $exception instanceof \Illuminate\Http\Exceptions\ThrottleRequestsException ||
                ($exception instanceof \Symfony\Component\HttpKernel\Exception\HttpException && $exception->getStatusCode() == '429')
            ) {
                return response()->json([
                                            'status' => 'error',
                                            'status_code' => Response::HTTP_TOO_MANY_REQUESTS,
                                            'message' => __('Too Many Requests'),
                                        ], Response::HTTP_TOO_MANY_REQUESTS, $exception->getHeaders()); // 429
            } /**
             * Name: Service Unavailable
             * Code: 503
             * Res: Response::HTTP_SERVICE_UNAVAILABLE
             */
            elseif (
                $exception instanceof \Illuminate\Foundation\Http\Exceptions\MaintenanceModeException ||
                ($exception instanceof \Symfony\Component\HttpKernel\Exception\HttpException && $exception->getStatusCode() == '503')
            ) {
                return response()->json([
                                            'status' => 'error',
                                            'status_code' => Response::HTTP_SERVICE_UNAVAILABLE,
                                            'message' => __($exception->getMessage() ?: 'Service Unavailable'),
                                        ], Response::HTTP_SERVICE_UNAVAILABLE, $exception->getHeaders()); // 503
            } /**
             * Name: Internal Server Error
             * Code: 500
             * Res:
             */
            elseif (
                $exception instanceof \Symfony\Component\Routing\Exception\RouteNotFoundException ||
                $exception instanceof \BadMethodCallException ||
                $exception instanceof \Illuminate\Contracts\Container\BindingResolutionException ||
                ($exception instanceof \Symfony\Component\HttpKernel\Exception\HttpException && $exception->getStatusCode() == '500')
            ) {
                // If debug enabled
                if (config('app.debug')) {
                    return response()->json([
                                                'status' => 'error',
                                                'status_code' => Response::HTTP_INTERNAL_SERVER_ERROR,
                                                'message' => $exception->getMessage() ?: 'Server Error',
                                                'code' => $exception->getCode(),
                                                'file' => $exception->getFile(),
                                                'line' => $exception->getLine(),
                                                'trace' => $exception->getTrace(),
                                            ], Response::HTTP_INTERNAL_SERVER_ERROR); // 500
                } else {
                    return response()->json([
                                                'status' => 'error',
                                                'status_code' => Response::HTTP_INTERNAL_SERVER_ERROR,
                                                'message' => 'Server Error',
                                            ], Response::HTTP_INTERNAL_SERVER_ERROR); // 500
                }
            }
        }
    }
}
