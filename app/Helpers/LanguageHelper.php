<?php

namespace App\Helpers;

class LanguageHelper
{
    public static function getLanguageName($locale)
    {
        $locales = config('app.locales');

        foreach ($locales as $localeItem) {
            if ($localeItem['code'] === $locale) {
                return $localeItem['name'];
            }
        }

        return config('app.fallback_locale');
    }
}
