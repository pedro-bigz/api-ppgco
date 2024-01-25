<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;

class ApiProtectedRoute extends BaseMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();
        } catch (TokenInvalidException $e) {
            return jwtExceptionHandler($e, 'Token is Invalid', 403);
        } catch (TokenExpiredException $e) {
            return jwtExceptionHandler($e, 'Token is Expired', 401);
        } catch (Exception $e) {
            return jwtExceptionHandler($e, 'Authorization Token not found', 404);
        }

        return $next($request);
    }
}