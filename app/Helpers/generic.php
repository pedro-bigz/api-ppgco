<?php

use Illuminate\Support\Str;

if (! function_exists('uuid')) {
    /**
     * @return string
     */
    function uuid()
    {
        return Str::random(4) . Str::random(4) . '-' . Str::random(4);
    }
}

if (! function_exists('long_uuid')) {
    /**
     * @return string
     */
    function long_uuid()
    {
        return Str::random(40);
    }
}