<?php declare(strict_types=1);

abstract class Input {
    public static function post(string $field): mixed {
        // Takes raw data from the request
        $json = file_get_contents('php://input');

        // Converts it into a PHP object
        if ($json) {
            $data = json_decode($json, true);
            if ($data) {
                $_POST = array_merge($_POST ? $_POST : [], $data);
            }
        }

        return isset($_POST[$field]) ? $_POST[$field] : null;
    }

    public static function get(string $field): ?string {
        return isset($_GET[$field]) ? $_GET[$field] : null;
    }
}