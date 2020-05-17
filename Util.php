<?php

namespace App;

class Util
{
    public static function object_get($object, $key, $default = null)
    {
        if (is_null($key) || trim($key) == '') {
            return $object;
        }

        foreach (explode('.', $key) as $segment) {
            if (!is_object($object) || !isset($object->{$segment})) {
                return $default;
            }

            $object = $object->{$segment};
        }

        return $object;
    }

    public static function array_get($array, $key, $default = null)
    {
        if (!static::array_accessible($array)) {
            return $default;
        }

        if (is_null($key)) {
            return $array;
        }

        if (static::array_exists($array, $key)) {
            return $array[$key];
        }

        if (strpos($key, '.') === false) {
            return $array[$key] ?? $default;
        }

        foreach (explode('.', $key) as $segment) {
            if (static::array_accessible($array) && static::array_exists($array, $segment)) {
                $array = $array[$segment];
            } else {
                return $default;
            }
        }

        return $array;
    }

    public static function array_accessible($value)
    {
        return is_array($value) || $value instanceof ArrayAccess;
    }

    public static function array_exists($array, $key)
    {
        if ($array instanceof ArrayAccess) {
            return $array->offsetExists($key);
        }

        return array_key_exists($key, $array);
    }

    public static function getPathOf(string $fileName): string
    {
        return __DIR__ . '/' . $fileName;
    }

    public static function endsWith($string, $endString)
    {
        $len = strlen($endString);
        if ($len == 0) {
            return true;
        }
        return (substr($string, -$len) === $endString);
    }
}