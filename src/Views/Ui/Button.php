<?php

namespace App\Views\Ui;

class Button
{
    public static function createButton($link): string
    {
        if(!$link) {
            return '';
        }

        return sprintf(
            "
            <a href='%s'>
                <button class='btn'>
                    Подробнее
                </button>
            </a>
            "
        , $link);
    }
}