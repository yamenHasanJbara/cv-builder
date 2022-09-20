<?php


namespace App\Constants;


class LanguageConstant
{
    const BEGINNER = 1;
    const INTERMEDIATE = 2;
    const ADVANCED = 3;
    const PROFESSIONAL = 4;
    const NATIVE = 5;

    public static function getLanguageLevel()
    {
        return
            [
                self::BEGINNER => 'BEGINNER',
                self::INTERMEDIATE => 'INTERMEDIATE',
                self::ADVANCED => 'ADVANCED',
                self::PROFESSIONAL => 'PROFESSIONAL',
                self::NATIVE => 'NATIVE'
            ];
    }
}
