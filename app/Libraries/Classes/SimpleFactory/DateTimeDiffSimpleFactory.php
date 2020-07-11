<?php
namespace App\Libraries\Classes\SimpleFactory;

use App\Libraries\Classes\DateTimeDiff\BaseDateTimeDiff;

/**
 * @method DateTimeDiff CreateInstance(string $filter)
 */
class DateTimeDiffSimpleFactory
{
    /**
     * @param string $param
     * @return BaseDateTimeDiff
     */
    public function CreateInstance(string $filter) : BaseDateTimeDiff
    {
        return new BaseDateTimeDiff();
    }
}