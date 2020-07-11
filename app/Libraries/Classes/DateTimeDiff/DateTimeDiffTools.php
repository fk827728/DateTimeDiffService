<?php
namespace App\Libraries\Classes\DateTimeDiff;

use App\Libraries\Classes\SimpleFactory\DateTimeDiffSimpleFactory;
use App\Libraries\Classes\DateTimeDiff\BaseDateTimeDiff;

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
        $factory = new DateTimeDiffSimpleFactory();
        $datetimediff = $factory->CreateInstance($filter);
        $this->datetimediff = $datetimediff;
    }

    /**
     * @param string $start
     * @param string $end
     * @return array
     */
    public function GetDateTimeDiff(string $start, string $end) : array
    {
        return $this->datetimediff->GetDateTimeDiff($start, $end);
    }
}