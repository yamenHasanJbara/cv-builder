<?php


namespace App\Constants;


class PersonalInformationConstant
{
    const MALE = 1;
    const FEMALE = 2;

    public static function getGender()
    {
        return
            [
                self::MALE => 'MALE',
                self::FEMALE => 'FEMALE'
            ];
    }
}
