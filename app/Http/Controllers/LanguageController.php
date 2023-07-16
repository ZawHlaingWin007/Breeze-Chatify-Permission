<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LanguageController extends Controller
{
    public function __invoke(Request $request, $lang)
    {
        abort_if(! in_array($lang, array_column(config('app.locales'), 'code')), 404);
        
        App::setLocale($lang);
        session()->put('lang', $lang);

        return back();
    }
}
