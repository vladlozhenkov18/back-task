<?php

namespace App\Views\Ui;

class Image
{
    public static function createImage($link): string
    {
        if(!$link) {
            return '';
        }

        if(is_array($link)) {
            $link = implode($link);
        }

        return sprintf("<img src='%s'>", $link);
    }
}