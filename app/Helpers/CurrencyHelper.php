<?php

namespace App\Helpers;

class CurrencyHelper
{
    public static function getSymbol(string $currency): string
    {
        $symbols = [
            'USD' => '$',
            'EUR' => '€',
            'GBP' => '£',
            'JPY' => '¥',
            'CAD' => 'C$',
            'NIS' => '₪',
        ];

        return $symbols[$currency] ?? $currency;
    }
}
