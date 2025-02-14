<?php declare (strict_types = 1);

class Shortcuts
{
    public static function shortcuts()
    {
        return [
            [
                'keys' => 'h',
                'location' => BASE_URL . '',
            ],
            [
                'keys' => 'e',
                'location' => BASE_URL . '/entries',
            ],
            [
                'keys' => 'n',
                'location' => BASE_URL . '/network',
            ],
        ];
    }
}
