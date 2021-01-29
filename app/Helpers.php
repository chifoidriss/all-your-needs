<?php

use App\Models\AwtClass;
use App\Models\Devise;
use App\Models\Setting;
use Illuminate\Support\Facades\Cookie;

function formatDate($date, $forHumans = 1, $onlyDate = 0) {
    if ($forHumans == 1) {
        $dt = Carbon\Carbon::instance($date);
        return $dt->diffForHumans();
    }
    if ($onlyDate == 1) {
        return date("d M Y", strtotime($date));
    }
    return date("d M Y - H:i", strtotime($date));
}


function getPrice($priceInEuro) {
    $price = floatval($priceInEuro);

    $devise = Cookie::get('devise', 'eur');

    $exist = Devise::whereName($devise)->first();

    if (!$exist || $exist->name == 'eur') {
        return number_format($price, 2, ',', ' ').' €';
    }

    $price = $price * $exist->factor;
    if ($exist->precision == 0) {
        $price = ceil($price);
    }

    return number_format($price, $exist->precision, ',', ' ').' '.strtoupper($exist->symbol);
}

function phone($number, $code) {
    return "+ $code $number";
}


function setting($key, $default = null) {
    $setting = Setting::where('key', $key)->first();
    return $setting ? $setting->value : $default;
}


function remove_query_params(array $params = []) {
    $url = url()->current();
    $query = request()->query();

    foreach($params as $param) {
        unset($query[$param]);
    }

    return $query ? $url . '?' . http_build_query($query) : $url;
}


function add_query_params(array $params = []) {
    $query = array_merge(
        request()->query(),
        $params
    );

    return url()->current() . '?' . http_build_query($query);
}


function awt($word, $locale = null) {
    return $word;
    
    return (new AwtClass())->awtTrans($word, $locale);
}