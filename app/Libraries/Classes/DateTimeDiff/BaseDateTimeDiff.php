<?php
namespace App\Libraries\Classes\DateTimeDiff;

use Carbon\Carbon;

/**
 * @method array GetDateTimeDiff(string $start, string $end)
 */
class BaseDateTimeDiff
{
    /**
     * @param string $start
     * @param string $end
     * @return array
     */
    public function GetDateTimeDiff(string $start, string $end) : array
    {
        $ret = [];

        $datetime_start = Carbon::parse($start);
        $datetime_end = Carbon::parse($end);

        /****************************************************************************************/
        /* small value is in the front
        /****************************************************************************************/
        if ($datetime_start > $datetime_end)
        {
            $tmp = $datetime_start;
            $datetime_start = $datetime_end;
            $datetime_end = $tmp;
        }

        /****************************************************************************************/
        /* the logic of Carbon::diffInWeekdays is if the end date is weekday and the time of the end day is greater than the time of the start,
        /* the end day will be consider as 1 weekday.
        /*
        /* new algorithm to calculate Australia/Adelaide complete week days
        /****************************************************************************************/
        $datetime_start->settimezone('+09:30');
        $datetime_end->settimezone('+09:30');

        $weekdays = $datetime_start->diffInWeekdays($datetime_end);

        $start_stamp = $datetime_start->hour * 3600 + $datetime_start->minute * 60 + $datetime_start->second;
        $end_stamp = $datetime_end->hour * 3600 + $datetime_end->minute * 60 + $datetime_end->second;

        /****************************************************************************************/
        /* First add the weekday back, make it the same as other situations
        /****************************************************************************************/
        if ($datetime_end->isWeekday() && $end_stamp <= $start_stamp)
        {
            $weekdays ++;
        }
        
        /****************************************************************************************/
        /* Only when start date and end date are both weekend, the weekdays is right
        /****************************************************************************************/
        if ($datetime_start->isWeekday() || $datetime_end->isWeekday())
        {
            $weekdays --;
        }

        if ($datetime_start->isWeekday() && $datetime_end->isWeekday() && $end_stamp < $start_stamp)
        {
            $weekdays --;
        }
        
        $ret['days'] = $datetime_start->diffInDays($datetime_end);
        $ret['weekdays'] = $weekdays;
        // $ret['compete_weeks'] = intdiv($ret['days'], 7);
        $ret['compete_weeks'] = $datetime_start->diffinweeks($datetime_end);
        
        return $ret;
    }
}