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
        return 0;
    }
}