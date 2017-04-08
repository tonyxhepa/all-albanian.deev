<?php
/**
 * Created by PhpStorm.
 * User: tonyx
 * Date: 3/13/2017
 * Time: 7:04 PM
 */

namespace App\Http\Utilities;


class Year
{
    protected static $years = [
      '1980',
        '1981',
        '1982',
        '1983',
        '1984',
        '1985'
    ];

    public static function all()
    {
        return static::$years;
    }

}