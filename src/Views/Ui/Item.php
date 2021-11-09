<?php

namespace App\Views\Ui;

use App\Utils\Text;

class Item
{
    public static function createItem(string $title, string $text): string
    {
        if(!$title || !$text) {
            return '';
        }

        return sprintf(
            "
            <h1 class='title'>%s</h1>
            <h2 class='text'>%s</h2>
            "
        , $title, $text);
    }
}