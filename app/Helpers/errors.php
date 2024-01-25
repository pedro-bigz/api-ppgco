<?php

use Symfony\Component\HttpFoundation\Request as SymfonyRequest;

if (! function_exists('jwtExceptionHandler')) {
    /**
     * Return error response for application programming interface.
     *
     * @param Exception $e
     * @param string $message
     * @param int $code
     * @return string
     */
    function jwtExceptionHandler(Exception $e, string $message, int $code)
    {
        $status = 'error';
        $response = [
            'status' =>         $status,
            'message' =>        $message,
            'jwt-message' =>    $e->getMessage()
        ];

        return response()->json($response, $code);
    }
}