<?php

namespace App\Http\Controllers;

use App\Models\Devise;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        return view('index');
    }


    public function contact()
    {
        return view('contact');
    }


    public function setLocale($locale)
    {
        if (in_array($locale, config('app.locales'))) {
            // notify()->success('Your favorite language has been changed successful.');
            return back()->withCookie(cookie()->forever('locale', $locale));
        }
        return back();
    }
    
    
    public function setDevise($devise)
    {
        $exist = Devise::whereName($devise)->first();
    
        if ($exist) {
            // notify()->success('Your favorite language has been changed successful.');
            return back()->withCookie(cookie()->forever('device', $devise));
        }
        return back();
    }

    public function translationFile()
    {
        $AwtFile = resource_path('lang/fr/awt.php');
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

        return view('translation', compact([
            'lines'
        ]));
    }

    public function updateTranslationFile(Request $request)
    {
        $words = $request->words;
        $translates = $request->translates;

        $AwtFile = resource_path('lang/fr/awt.php');
        $AwtFile = copy(resource_path('lang/awt.stub'), $AwtFile);
        $AwtFile = resource_path('lang/fr/awt.php');
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
