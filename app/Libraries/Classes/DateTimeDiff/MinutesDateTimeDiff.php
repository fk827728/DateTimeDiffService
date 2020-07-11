<?php
namespace App\Libraries\Classes\DateTimeDiff;

use App\Libraries\Classes\DateTimeDiff\BaseDateTimeDiff;

/**
 * @method array GetDateTimeDiff(string $start, string $end)
 */
class MinutesDateTimeDiff extends BaseDateTimeDiff
{
    /**
     * @param string $start
     * @param string $end
     * @return array
     */
    public function GetDateTimeDiff(string $start, string $end) : array
    {
        $data = parent::GetDateTimeDiff($start, $end);

        $ret['days_minutes'] = $data['days'] * 24 * 60;
        $ret['weekdays_minutes'] = $data['weekdays'] * 24 * 60;
        $ret['compete_weeks_minutes'] = $data['compete_weeks'] * 7 * 24 * 60;
        
        return $ret;
    }
}