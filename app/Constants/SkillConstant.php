<?php


namespace App\Constants;


class SkillConstant
{

    const BEGINNER = 1;
    const INTERMEDIATE = 2;
    const EXPERT = 3;

    public static function getSkillLevel()
    {
        return
            [
                self::BEGINNER => 'BEGINNER',
                self::INTERMEDIATE => 'INTERMEDIATE',
                self::EXPERT => 'EXPERT'
            ];
    }
}
