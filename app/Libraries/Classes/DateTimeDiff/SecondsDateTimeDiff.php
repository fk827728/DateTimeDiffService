<?php
namespace App\Libraries\Classes\DateTimeDiff;

use App\Libraries\Classes\DateTimeDiff\BaseDateTimeDiff;

/**
 * @method array GetDateTimeDiff(string $start, string $end)
 */
class SecondsDateTimeDiff extends BaseDateTimeDiff
{
    /**
     * @param string $start
     * @param string $end
     * @return array
     */
    public function GetDateTimeDiff(string $start, string $end) : array
    {
        $data = parent::GetDateTimeDiff($start, $end);

        $ret['days_seconds'] = $data['days'] * 24 * 60 * 60;
        $ret['weekdays_seconds'] = $data['weekdays'] * 24 * 60 * 60;
        $ret['compete_weeks_seconds'] = $data['compete_weeks'] * 7 * 24 * 60 * 60;

        return $ret;
    }
}