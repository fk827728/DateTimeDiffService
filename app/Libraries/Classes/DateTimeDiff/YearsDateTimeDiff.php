<?php
namespace App\Libraries\Classes\DateTimeDiff;

use App\Libraries\Classes\DateTimeDiff\BaseDateTimeDiff;

/**
 * @method array GetDateTimeDiff(string $start, string $end)
 */
class YearsDateTimeDiff extends BaseDateTimeDiff
{
    /**
     * @param string $start
     * @param string $end
     * @return array
     */
    public function GetDateTimeDiff(string $start, string $end) : array
    {
        return [];
    }
}