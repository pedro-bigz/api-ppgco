<?php

use Illuminate\Support\Collection;

if (! function_exists('is_assoc')) {
    function is_assoc(array $arr)
    {
        return !empty($arr) && array_keys($arr) !== range(0, count($arr) - 1);
    }
}

if (! function_exists('first')) {
    function first(?array $arr = [])
    {
        return $arr[0] ?? null;
    }
}

if (! function_exists('is_sequencial')) {
    function is_sequencial(array $arr)
    {
        return !empty($arr) && array_keys($arr) === range(0, count($arr) - 1);
    }
}

if (! function_exists('sequencial_to_associative')) {
    function sequencial_to_associative(array $arr)
    {
        $assocArr = [];

        foreach ($arr as $value) {
            $assocArr[$value] = $value;
        }

        return $assocArr;
    }
}

if (! function_exists('copyArray')) {
    function copyArray(array $arr)
    {
        return (new \ArrayObject($arr))->getArrayCopy();
    }
}

if (! function_exists('uniqueBy')) {
    function uniqueBy($obj, $key) {
        return collect($obj)->groupBy($key)->map->first()->values();
    }
}

if (! function_exists('reformatChangedFields')) {
    function reformatChangedFields(array $changedFields)
    {
        $result = [];
        foreach ($changedFields as $key => $value) {
            $keys = explode('.', $key);
            $current = &$result;
            foreach ($keys as $nestedKey) {
                $current = &$current[$nestedKey];
            }
            $current = $value;
        }
        return $result;
    }
}

if (! function_exists('convertKeysToString')) {
    function convertKeysToString(array $data)
    {
        $keys = array_keys($data);
        return implode('; ', $keys);
    }
}