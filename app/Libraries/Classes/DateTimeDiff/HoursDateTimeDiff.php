<?php
namespace App\Libraries\Classes\DateTimeDiff;

use App\Libraries\Classes\DateTimeDiff\BaseDateTimeDiff;

/**
 * @method array GetDateTimeDiff(string $start, string $end)
 */
class HoursDateTimeDiff extends BaseDateTimeDiff
{
    /**
     * @param string $start
     * @param string $end
     * @return array
     */
    public function GetDateTimeDiff(string $start, string $end) : array
    {
        $data = parent::GetDateTimeDiff($start, $end);

        $ret['days_hours'] = $data['days'] * 24;
        $ret['weekdays_hours'] = $data['weekdays'] * 24;
        $ret['compete_weeks_hours'] = $data['compete_weeks'] * 7 * 24;
        
        return $ret;
    }
}