<?php

namespace App\Utils;

class Json
{
    static public function getData(): array
    {
        $element = file_get_contents(JSON_PATH);
        return array_values(json_decode($element, true));
    }
}