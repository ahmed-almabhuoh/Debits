<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = ['key', 'value'];

    public static function getSupportedCurrencies(): array
    {
        $setting = self::where('key', 'supported_currencies')->first();
        return $setting ? json_decode($setting->value, true) : ['USD', 'EUR', 'GBP', 'JPY', 'CAD', 'NIS'];
    }

    public static function getDefaultCurrency(): string
    {
        $setting = self::where('key', 'default_currency')->first();
        return $setting ? $setting->value : 'USD';
    }
}
