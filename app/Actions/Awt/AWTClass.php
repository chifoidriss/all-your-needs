<?php
namespace App\Actions\AWT;

use Exception;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Lang;

class AWTClass
{

    /**
     * AWT translation helper function
     * @param $word
     * @param null $locale
     * @return string
     */
    public function awtTrans($word, $locale = null)
    {
        //Set Locale for translator
        if ($locale == null)
        {
            if(config('awt.use_app_locale'))
            {
                $locale = App::getLocale();
            }else
            {
                $locale=config('awt.default_locale');
            }
        }


        $AwtFile = resource_path('lang/' . $locale . '/awt.php');
        if (file_exists($AwtFile)) {
            if (Lang::get('awt.' . $word,[],$locale,false)!='awt.' . $word) {
                return trans('awt.' . $word);
            }
        }

        try {
            $langFile = $this->openAwtLangFile($AwtFile, $locale);
            if ($langFile) {
                if(config('awt.allow_google_translate')) {
                    $translateClient = new \Stichoza\GoogleTranslate\GoogleTranslate();
                    $translatedWord = $translateClient->setSource(null)->setTarget($locale)->translate($word);
                } else {
                    $translatedWord=$word;
                }

                $this->pushWord($word, $translatedWord, $AwtFile);
                return $translatedWord;
            }

        } catch (Exception $e) {
            return $word;
        }

        return trans('awt.' . $word);
    }


    /**
     * Open AWT Lang file
     *
     * @param $AwtFile
     * @return bool|resource
     */
    public function openAwtLangFile($AwtFile, $locale)
    {
        if (!file_exists($AwtFile)) {
            $file = self::createAwtLangFile($AwtFile, $locale);

            return $file;
        }
        $file = file($AwtFile);
        return $file;
    }


    /**
     * Create AWT Lang File
     * @param $AwtFile
     * @return bool|resource
     */
    public function createAwtLangFile($AwtFile, $locale)
    {
        if (!file_exists(resource_path('lang/' . $locale))) {
            mkdir(resource_path('lang/' . $locale), 0777, false);
        }
        $file = copy(__DIR__ . '/stubs/blank.stub', $AwtFile);
        return $file;
    }


    /**
     * Push The Word To AWT Array File
     *
     * @param $word
     * @param $translate
     * @param $AwtFile
     */
    public function pushWord($word, $translate, $AwtFile)
    {
        $lines = array();
        foreach (file($AwtFile) as $line) {
            if (strpos($line, '#AWTLINEHELPER') !== false) {
                array_push($lines, '"' . $word. '"=>"' . $translate . '",');
                array_push($lines, "\n");
            }

            array_push($lines, $line);
        }
        file_put_contents($AwtFile, $lines);
    }

}