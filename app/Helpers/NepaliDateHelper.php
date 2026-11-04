<?php

namespace App\Helpers;

use Carbon\Carbon;
use Nilambar\NepaliDate\NepaliDate;

class NepaliDateHelper
{
    protected static $months = [
        1 => 'बैशाख', 2 => 'जेठ', 3 => 'असार', 4 => 'साउन', 5 => 'भदौ', 6 => 'असोज',
        7 => 'कार्तिक', 8 => 'मंसिर', 9 => 'पुस', 10 => 'माघ', 11 => 'फागुन', 12 => 'चैत',
    ];

    protected static $digits = ['0' => '०', '1' => '१', '2' => '२', '3' => '३', '4' => '४', '5' => '५', '6' => '६', '7' => '७', '8' => '८', '9' => '९'];

    // Convert English digits in a string/number to Nepali digits
    public static function digits($value)
    {
        return strtr((string) $value, self::$digits);
    }

    // Convert an AD date to BS: ['year' => 2083, 'month' => 7, 'day' => 18]
    public static function toBs($date)
    {
        $date = Carbon::parse($date);

        return (new NepaliDate())->convertAdToBs($date->year, $date->month, $date->day);
    }

    // Format an AD date as a Nepali BS date, e.g. "कार्तिक १८, २०८३" (optionally with "१४:३०")
    public static function format($date, $withTime = false)
    {
        if (!$date) { return ''; }

        $date = Carbon::parse($date);
        $bs = self::toBs($date);

        // Outside the converter's supported range, fall back to the AD date
        if (empty($bs)) { return $date->format($withTime ? 'M d, Y H:i' : 'M d, Y'); }

        $formatted = self::$months[$bs['month']] . ' ' . self::digits($bs['day']) . ', ' . self::digits($bs['year']);

        return $withTime ? $formatted . ' ' . self::digits($date->format('H:i')) : $formatted;
    }

    // Nepali weekday name, e.g. "सोमबार"
    public static function weekday($date = null)
    {
        $days = ['आइतबार', 'सोमबार', 'मंगलबार', 'बुधबार', 'बिहीबार', 'शुक्रबार', 'शनिबार'];

        return $days[Carbon::parse($date ?? now())->dayOfWeek];
    }

    // Relative time in Nepali, e.g. "५ मिनेट अगाडि"
    public static function ago($date)
    {
        $seconds = max(0, now()->getTimestamp() - Carbon::parse($date)->getTimestamp());

        $units = [
            'वर्ष' => 31536000,
            'महिना' => 2592000,
            'हप्ता' => 604800,
            'दिन' => 86400,
            'घण्टा' => 3600,
            'मिनेट' => 60,
        ];

        foreach ($units as $label => $length) {
            if ($seconds >= $length) {
                return self::digits(intdiv($seconds, $length)) . ' ' . $label . ' अगाडि';
            }
        }

        return 'भर्खरै';
    }
}
