<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function index()
    {
        $locales = collect(config('app.locales'));
        return view('admin.languages.index', compact(['locales']));
    }


    public function setLocale($locale)
    {
        $locales = collect(config('app.locales'));
        if ($locales->has($locale)) {
            // notify()->success('Your favorite language has been changed successful.');
            return back()->withCookie(cookie()->forever('locale', $locale));
        }
        return back();
    }


    public function translationFile($target)
    {
        $AwtFile = resource_path("lang/$target/awt.php");

        if (!file_exists($AwtFile)) {
            $AwtFile = copy(resource_path('lang/awt.stub'), $AwtFile);
        }

        $lines = [];
        $file = file($AwtFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($file as $line) {
            $one = explode('=>', $line, 2);
            if (count($one) == 2) {
                $elt = [
                    'word' => substr($one[0], 1, -1),
                    'translate' => substr($one[1], 1, -2),
                ];
                if (strlen($elt['word']) > 0) {
                    array_push($lines, $elt);
                }
            }
        }

        return view('admin.languages.translation', compact([
            'lines',
            'target'
        ]));
    }


    public function updateTranslationFile($target, Request $request)
    {
        $words = $request->words;
        $translates = $request->translates;

        $AwtFile = resource_path("lang/$target/awt.php");
        $AwtFile = copy(resource_path('lang/awt.stub'), $AwtFile);
        $AwtFile = resource_path("lang/$target/awt.php");
        $lines = array();
        foreach (file($AwtFile) as $line) {
            if (strpos($line, '#AWTLINEHELPER') !== false) {
                for ($i=0; $i < count($words); $i++) {
                    if (strlen($words[$i]) > 0) {
                        array_push($lines, '"' . $words[$i]. '"=>"' . $translates[$i] . '",');
                        array_push($lines, "\n");
                    }
                }
            }

            array_push($lines, $line);
        }

        file_put_contents($AwtFile, $lines);

        // notify()->success('Language file updated successful.');
        return back();
    }
}
