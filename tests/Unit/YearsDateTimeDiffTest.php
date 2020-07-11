<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Libraries\Classes\DateTimeDiff\YearsDateTimeDiff;

class YearsDateTimeDiffTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $datetimediff = new YearsDateTimeDiff();
 
        $diff = $datetimediff->GetDateTimeDiff('2018-07-10T11:59:59', '2020-07-11');
        $this->assertEquals($diff, ['days_years' => 2, 'weekdays_years' => 1, 'compete_weeks_years' => 1]);

        $diff = $datetimediff->GetDateTimeDiff('2013-07-10T23:30:00', '2020-07-13T23:00:00');
        $this->assertEquals($diff, ['days_years' => 7, 'weekdays_years' => 5, 'compete_weeks_years' => 7]); 

        $diff = $datetimediff->GetDateTimeDiff('2013-07-10T23:30:00', '2015-07-13T23:00:00');
        $this->assertEquals($diff, ['days_years' => 2, 'weekdays_years' => 1, 'compete_weeks_years' => 1]); 
        
        $diff = $datetimediff->GetDateTimeDiff('2013-07-10T23:30:00', '2016-07-13T23:00:00');
        $this->assertEquals($diff, ['days_years' => 3, 'weekdays_years' => 2, 'compete_weeks_years' => 2]); 
        
        $diff = $datetimediff->GetDateTimeDiff('2016-01-10T23:30:00', '2020-07-13T23:00:00');
        $this->assertEquals($diff, ['days_years' => 4, 'weekdays_years' => 3, 'compete_weeks_years' => 4]); 
        
        $diff = $datetimediff->GetDateTimeDiff('2003-07-10T23:30:00', '2020-01-13T23:00:00');
        $this->assertEquals($diff, ['days_years' => 16, 'weekdays_years' => 11, 'compete_weeks_years' => 16]); 

        $diff = $datetimediff->GetDateTimeDiff('2009-07-10T23:30:00', '2020-07-13T23:00:00');
        $this->assertEquals($diff, ['days_years' => 11, 'weekdays_years' => 7, 'compete_weeks_years' => 11]); 
        
        $diff = $datetimediff->GetDateTimeDiff('2013-01-10T23:30:00', '2015-12-13T23:00:00');
        $this->assertEquals($diff, ['days_years' => 2, 'weekdays_years' => 2, 'compete_weeks_years' => 2]);
    }
}
