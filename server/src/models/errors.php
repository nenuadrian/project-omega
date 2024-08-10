<?php declare (strict_types = 1);

class Errors
{
    private static $errors = [];

    public static function add(string $message)
    {
        Errors::$errors[] = [
            "message" => $message,
        ];
    }

    public static function errors()
    {
        $errors = Errors::$errors;
        Errors::$errors = [];
        return $errors;
    }

    public static function present()
    {
        return !empty(Errors::$errors);
    }
}
