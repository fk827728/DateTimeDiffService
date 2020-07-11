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
        $data = parent::GetDateTimeDiff($start, $end);

        //take 365 days as 1 year
        $ret['days_years'] = intdiv($data['days'], 365);
        $ret['weekdays_years'] = intdiv($data['weekdays'], 365);
        $ret['compete_weeks_years'] = intdiv($data['compete_weeks'] * 7, 365);
        
        return $ret;
    }
}