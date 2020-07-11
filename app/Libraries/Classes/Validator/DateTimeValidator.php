<?php
namespace App\Libraries\Classes\Validator;

use App\Libraries\Classes\Validator\Validator;

/**
 * @method int IsFormatValid(string $param)
 */
class DatetimeValidator extends Validator
{
    /**
     * @param string $param
     * @return int
     */
    protected function IsFormatValid(string $param) : int
    {
        if (preg_match("/^[0-9]{4}-(0[1-9]|1[0-2]|[1-9])-(0[1-9]|[1-2][0-9]|3[0-1]|[1-9])$/",$param)
         || preg_match("/^[0-9]{4}-(0[1-9]|1[0-2]|[1-9])-(0[1-9]|[1-2][0-9]|3[0-1]|[1-9])T([0-1][0-9]|2[0-3]|[0-9]):([0-5][0-9]|[0-9]):([0-5][0-9]|[0-9])$/",$param)
         || preg_match("/^[0-9]{4}-(0[1-9]|1[0-2]|[1-9])-(0[1-9]|[1-2][0-9]|3[0-1]|[1-9])T([0-1][0-9]|2[0-3]|[0-9]):([0-5][0-9]|[0-9]):([0-5][0-9]|[0-9])(\+|-)(0[0-9]|1[0-2]|[0-9]):(0|00|30)$/",$param))
        {
            return 0;
        }
        return 2;
    }
}