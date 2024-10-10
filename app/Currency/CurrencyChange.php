<?php

namespace App\Currency;

use App\Models\Setting;

use App\Models\Country;

class CurrencyChange
{
    public $CurrencyId;

    public $CurrencyPosition;

    public $defaultCurrency;

    public $afterdecimalpoint;

    public function __construct()
    {
        // $this->CurrencyId = Setting::where('key','CURRENCY_COUNTRY_ID')->first();

        // $this->CurrencyPosition = Setting::where('key','CURRENCY_POSITION')->first();
        // $this->defaultCurrency = Country::where('id',$this->CurrencyId->value)->first();
        $sitesetup = Setting::where('type','site-setup')->where('key', 'site-setup')->first();
        $sitesetupdata = $sitesetup ? json_decode($sitesetup->value, true) : null;

        $this->CurrencyId = $sitesetupdata['default_currency'] ?? null;
        $this->CurrencyPosition = $sitesetupdata['currency_position'] ?? null;
        $this->afterdecimalpoint = $sitesetupdata['digitafter_decimal_point'] ?? null;
        $this->defaultCurrency = Country::where('id', $this->CurrencyId)->first();

        

    }

    public function getDefaultCurrency($array = false)
    {
        $data = [
            'defaultCurrency' => $this->defaultCurrency ?? null,
            'defaultPosition' => $this->CurrencyPosition ?? null,
            // 'defaultPosition' => $this->CurrencyPosition->value ?? null,
        ];
    
        if ($array) {
            return $data;
        }
    
        return response()->json($data);
    }

    // public function convert($amount, $fromCurrency, $toCurrency)
    // {
    //     // Implement your currency conversion logic here
    // }
    public function defaultSymbol()
    {
        return $this->defaultCurrency->symbol ?? '';
    }

    public function defaultPosition()
    {
        return $this->CurrencyPosition ?? '';
    }

    public function format($amount)
    {
        $noOfDecimal = $this->afterdecimalpoint;
        $currencyPosition =   $this->CurrencyPosition;

        $currencySymbol = $this->defaultCurrency->symbol;

        return formatCurrency($amount, $noOfDecimal, $currencyPosition, $currencySymbol);
    }
}
