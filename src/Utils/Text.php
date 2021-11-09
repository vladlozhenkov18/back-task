<?php

namespace App\Utils;

class Text
{
    public static function validateString(array $text): string
    {
        $result = preg_replace('/\s\s+/', ' ', $text[0]);
        return substr($result, 0 , 200);
    }
}