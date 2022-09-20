<?php


namespace App\Constants;


class EducationConstant
{
    const UNDERGRADUATE = 1;
    const BACHELOR = 2;
    const MASTER = 3;
    const PHD = 4;

    public static function getDegree()
    {
        return
            [
                self::UNDERGRADUATE => 'UNDERGRADUATE',
                self::BACHELOR => 'BACHELOR',
                self::MASTER => 'MASTER',
                self::PHD => 'PHD'
            ];
    }
}
