<?php

namespace App\Utils;

class MomentFormatConverter
{
    
    private static $formatConvertRules = [
        'yyyy' => 'YYYY', 'yy' => 'YY', 'y' => 'YYYY',
        'dd' => 'DD', 'd' => 'D',
        'EE' => 'ddd', 'EEEEEE' => 'dd',
        'ZZZZZ' => 'Z', 'ZZZ' => 'ZZ',
        '\'T\'' => 'T',
    ];

    
    public function convert(string $format): string
    {
        return strtr($format, self::$formatConvertRules);
    }
}
