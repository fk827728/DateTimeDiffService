<?php
namespace App\Libraries\Classes\DateTimeDiff;

/**
 * @property $datetimediff
 * @method __construct(string $filter)
 * @method array GetDateTimeDiff(string $start, string $end)
 */
class DateTimeDiffTools
{
    private $datetimediff;

    /**
     * @param string $filter
     */
    public function __construct(string $filter)
    {
    }

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