<?php
/**
 * Created by PhpStorm.
 * User: tonyx
 * Date: 3/13/2017
 * Time: 7:04 PM
 */

namespace App\Http\Utilities;


class Gjinia
{
    protected static $gjinia = [
       '1' => 'femer',
        '2' => 'mashkull'
    ];

    public static function all()
    {
        return static::$gjinia;
    }

}