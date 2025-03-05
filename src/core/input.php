<?php declare(strict_types=1);

final class Input
{
  public static function any(string $field): ?string
  {
    return Input::get($field) ?? Input::post($field);
  }

  public static function post(string $field): mixed
  {
    $json = file_get_contents('php://input');

    if (!$json)
      return null;


    $data = json_decode($json, true);

    if ($data !== null) {
      $_POST = array_merge($_POST ?: [], $data);
    }

    return $_POST[$field] ?? null;
  }

  public static function cookie(string $field): ?string
  {
    return $_COOKIE[$field] ?? null;
  }

  public static function get(string $field): ?string
  {
    return $_GET[$field] ?? null;
  }
}
