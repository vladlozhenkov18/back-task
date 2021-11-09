<?php

namespace App\Services\View;

class Render
{
    static function view(string $pageName, array $props): void
    {
        foreach($props as $key => $value) {
            $$key = $value;
        }

        include_once PAGES_PATH . $pageName . '.php';
    }

}