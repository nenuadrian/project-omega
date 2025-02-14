<?php declare (strict_types = 1);

class Markdown {
    public static function  parse(string $string)
    {
        if (!$string) {
            return "";
        }

        $parsedown = new \Parsedown();
        return $parsedown->text($string);
    }
} 
