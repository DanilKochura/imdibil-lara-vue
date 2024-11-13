<?php

namespace App\UseCases;

trait ThemeTrait
{
    public static function isNewYear()
    {
        return (env('APP_THEME') == 'new_year' and (env('THEME_USER') == 'default' or auth()->id() == (int)env('THEME_USER')));
    }
}
