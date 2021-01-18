<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class LanguageController extends Controller
{
    /**
     * @desc To change the current language
     * @request Ajax
     */
    public function changeLanguage(Request $request) {
        if ($request->ajax()) {
            $request->session()->put('locale', $request->lang);
            $request->session()->flash('alert-success', ('app.Locale_Change_Success'));
        }
    }
}
