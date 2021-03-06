<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Libraries\Classes\DateTimeDiff\MinutesDateTimeDiff;

class MinutesDateTimeDiffTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $datetimediff = new MinutesDateTimeDiff();
 
        $diff = $datetimediff->GetDateTimeDiff('2020-07-10T11:59:59', '2020-07-11');
        $this->assertEquals($diff, ['days_minutes' => 1440 * 0, 'weekdays_minutes' => 1440 * 0, 'compete_weeks_minutes' => 7 * 1440 * 0]);

        $diff = $datetimediff->GetDateTimeDiff('2020-07-10T23:30:00', '2020-07-13T23:00:00');
        $this->assertEquals($diff, ['days_minutes' => 1440 * 2, 'weekdays_minutes' => 1440 * 1, 'compete_weeks_minutes' => 7 * 1440 * 0]);
        
        $diff = $datetimediff->GetDateTimeDiff('2020-07-10T23:00:00', '2020-07-13T23:00:01');
        $this->assertEquals($diff, ['days_minutes' => 1440 * 3, 'weekdays_minutes' => 1440 * 1, 'compete_weeks_minutes' => 7 * 1440 * 0]);

        $diff = $datetimediff->GetDateTimeDiff('2020-07-11T23:00:00', '2020-07-13T23:00:01');
        $this->assertEquals($diff, ['days_minutes' => 1440 * 2, 'weekdays_minutes' => 1440 * 1, 'compete_weeks_minutes' => 7 * 1440 * 0]);

        $diff = $datetimediff->GetDateTimeDiff('2020-07-11T23:00:00+09:30', '2020-07-13T23:00:01+09:30');
        $this->assertEquals($diff, ['days_minutes' => 1440 * 2, 'weekdays_minutes' => 1440 * 0, 'compete_weeks_minutes' => 7 * 1440 * 0]);

        $diff = $datetimediff->GetDateTimeDiff('2020-07-10T23:00:02+09:30', '2020-07-10T23:00:01+09:30');
        $this->assertEquals($diff, ['days_minutes' => 1440 * 0, 'weekdays_minutes' => 1440 * 0, 'compete_weeks_minutes' => 7 * 1440 * 0]);

        $diff = $datetimediff->GetDateTimeDiff('2020-07-10T23:00:02+09:30', '2020-07-10T23:00:01+09:30');
        $this->assertEquals($diff, ['days_minutes' => 1440 * 0, 'weekdays_minutes' => 1440 * 0, 'compete_weeks_minutes' => 7 * 1440 * 0]);
      
        $diff = $datetimediff->GetDateTimeDiff('2020-07-10T23:00:02+09:30', '2020-07-11T23:00:03+09:30');
        $this->assertEquals($diff, ['days_minutes' => 1440 * 1, 'weekdays_minutes' => 1440 * 0, 'compete_weeks_minutes' => 7 * 1440 * 0]);

        $diff = $datetimediff->GetDateTimeDiff('2020-07-12T23:00:02+09:30', '2020-07-13T23:00:03+09:30');
        $this->assertEquals($diff, ['days_minutes' => 1440 * 1, 'weekdays_minutes' => 1440 * 0, 'compete_weeks_minutes' => 7 * 1440 * 0]);
        
        $diff = $datetimediff->GetDateTimeDiff('2020-07-11T23:00:02+09:30', '2020-07-13T23:00:03+09:30');
        $this->assertEquals($diff, ['days_minutes' => 1440 * 2, 'weekdays_minutes' => 1440 * 0, 'compete_weeks_minutes' => 7 * 1440 * 0]);
       
        $diff = $datetimediff->GetDateTimeDiff('2020-07-11T00:00:02+09:30', '2020-07-11T23:00:03+09:30');
        $this->assertEquals($diff, ['days_minutes' => 1440 * 0, 'weekdays_minutes' => 1440 * 0, 'compete_weeks_minutes' => 7 * 1440 * 0]);
 
        $diff = $datetimediff->GetDateTimeDiff('2020-07-10T14:30:02', '2020-07-11T23:00:03+09:30');
        $this->assertEquals($diff, ['days_minutes' => 1440 * 0, 'weekdays_minutes' => 1440 * 0, 'compete_weeks_minutes' => 7 * 1440 * 0]);

        $diff = $datetimediff->GetDateTimeDiff('2020-07-06T14:30:02+09:30', '2020-07-10T23:00:03+09:30');
        $this->assertEquals($diff, ['days_minutes' => 1440 * 4, 'weekdays_minutes' => 1440 * 4, 'compete_weeks_minutes' => 7 * 1440 * 0]);

        $diff = $datetimediff->GetDateTimeDiff('2020-07-05T14:30:02+09:30', '2020-07-10T23:00:03+09:30');
        $this->assertEquals($diff, ['days_minutes' => 1440 * 5, 'weekdays_minutes' => 1440 * 4, 'compete_weeks_minutes' => 7 * 1440 * 0]);
       
        $diff = $datetimediff->GetDateTimeDiff('2020-07-05T14:30:02+09:30', '2020-07-11T23:00:03+09:30');
        $this->assertEquals($diff, ['days_minutes' => 1440 * 6, 'weekdays_minutes' => 1440 * 5, 'compete_weeks_minutes' => 7 * 1440 * 0]);

        $diff = $datetimediff->GetDateTimeDiff('2020-07-05T14:30:02+09:30', '2020-07-11T00:00:03+09:30');
        $this->assertEquals($diff, ['days_minutes' => 1440 * 5, 'weekdays_minutes' => 1440 * 5, 'compete_weeks_minutes' => 7 * 1440 * 0]);

        $diff = $datetimediff->GetDateTimeDiff('2020-07-05T14:30:02+09:30', '2020-07-05T00:00:03+09:30');
        $this->assertEquals($diff, ['days_minutes' => 1440 * 0, 'weekdays_minutes' => 1440 * 0, 'compete_weeks_minutes' => 7 * 1440 * 0]);

        $diff = $datetimediff->GetDateTimeDiff('2020-07-05T14:30:02+09:30', '2020-07-06T00:00:03+09:30');
        $this->assertEquals($diff, ['days_minutes' => 1440 * 0, 'weekdays_minutes' => 1440 * 0, 'compete_weeks_minutes' => 7 * 1440 * 0]);

        $diff = $datetimediff->GetDateTimeDiff('2020-07-05T14:30:02+09:30', '2020-07-06T20:00:03+09:30');
        $this->assertEquals($diff, ['days_minutes' => 1440 * 1, 'weekdays_minutes' => 1440 * 0, 'compete_weeks_minutes' => 7 * 1440 * 0]);

        $diff = $datetimediff->GetDateTimeDiff('2020-07-05T14:30:02+09:30', '2020-07-06T14:31:02+09:30+09:30');
        $this->assertEquals($diff, ['days_minutes' => 1440 * 1, 'weekdays_minutes' => 1440 * 0, 'compete_weeks_minutes' => 7 * 1440 * 0]);

        $diff = $datetimediff->GetDateTimeDiff('2020-07-08T14:30:02+09:30', '2020-07-09T14:31:02+09:30+09:30');
        $this->assertEquals($diff, ['days_minutes' => 1440 * 1, 'weekdays_minutes' => 1440 * 1, 'compete_weeks_minutes' => 7 * 1440 * 0]); 

        $diff = $datetimediff->GetDateTimeDiff('2020-07-08T14:30:02+09:30', '2020-07-09T14:30:02+09:30+09:30');
        $this->assertEquals($diff, ['days_minutes' => 1440 * 1, 'weekdays_minutes' => 1440 * 1, 'compete_weeks_minutes' => 7 * 1440 * 0]);
        
        $diff = $datetimediff->GetDateTimeDiff('2020-07-08T14:30:02+09:30', '2020-07-09T14:30:01+09:30+09:30');
        $this->assertEquals($diff, ['days_minutes' => 1440 * 0, 'weekdays_minutes' => 1440 * 0, 'compete_weeks_minutes' => 7 * 1440 * 0]);

        $diff = $datetimediff->GetDateTimeDiff('2020-07-06T14:30:02+09:30', '2020-07-10T23:00:03+09:30');
        $this->assertEquals($diff, ['days_minutes' => 1440 * 4, 'weekdays_minutes' => 1440 * 4, 'compete_weeks_minutes' => 7 * 1440 * 0]);

        $diff = $datetimediff->GetDateTimeDiff('2020-07-05T14:30:02+09:30', '2020-07-10T23:00:03+09:30');
        $this->assertEquals($diff, ['days_minutes' => 1440 * 5, 'weekdays_minutes' => 1440 * 4, 'compete_weeks_minutes' => 7 * 1440 * 0]);

        $diff = $datetimediff->GetDateTimeDiff('2020-07-06T14:30:02+09:30', '2020-07-11T23:00:03+09:30');
        $this->assertEquals($diff, ['days_minutes' => 1440 * 5, 'weekdays_minutes' => 1440 * 4, 'compete_weeks_minutes' => 7 * 1440 * 0]);

        $diff = $datetimediff->GetDateTimeDiff('2020-07-05T14:30:02+09:30', '2020-07-11T23:00:03+09:30');
        $this->assertEquals($diff, ['days_minutes' => 1440 * 6, 'weekdays_minutes' => 1440 * 5, 'compete_weeks_minutes' => 7 * 1440 * 0]);

        $diff = $datetimediff->GetDateTimeDiff('2020-07-06T14:30:02+09:30', '2020-07-10T11:00:03+09:30');
        $this->assertEquals($diff, ['days_minutes' => 1440 * 3, 'weekdays_minutes' => 1440 * 3, 'compete_weeks_minutes' => 7 * 1440 * 0]);

        $diff = $datetimediff->GetDateTimeDiff('2020-07-05T14:30:02+09:30', '2020-07-10T11:00:03+09:30');
        $this->assertEquals($diff, ['days_minutes' => 1440 * 4, 'weekdays_minutes' => 1440 * 4, 'compete_weeks_minutes' => 7 * 1440 * 0]);

        $diff = $datetimediff->GetDateTimeDiff('2020-07-06T14:30:02+09:30', '2020-07-11T11:00:03+09:30');
        $this->assertEquals($diff, ['days_minutes' => 1440 * 4, 'weekdays_minutes' => 1440 * 4, 'compete_weeks_minutes' => 7 * 1440 * 0]);

        $diff = $datetimediff->GetDateTimeDiff('2020-07-05T14:30:02+09:30', '2020-07-11T11:00:03+09:30');
        $this->assertEquals($diff, ['days_minutes' => 1440 * 5, 'weekdays_minutes' => 1440 * 5, 'compete_weeks_minutes' => 7 * 1440 * 0]);

        $diff = $datetimediff->GetDateTimeDiff('2020-07-06T14:30:02+09:30', '2020-07-10T14:30:02+09:30');
        $this->assertEquals($diff, ['days_minutes' => 1440 * 4, 'weekdays_minutes' => 1440 * 4, 'compete_weeks_minutes' => 7 * 1440 * 0]);

        $diff = $datetimediff->GetDateTimeDiff('2020-07-05T14:30:02+09:30', '2020-07-10T14:30:02+09:30');
        $this->assertEquals($diff, ['days_minutes' => 1440 * 5, 'weekdays_minutes' => 1440 * 4, 'compete_weeks_minutes' => 7 * 1440 * 0]);

        $diff = $datetimediff->GetDateTimeDiff('2020-07-06T14:30:02+09:30', '2020-07-11T14:30:02+09:30');
        $this->assertEquals($diff, ['days_minutes' => 1440 * 5, 'weekdays_minutes' => 1440 * 4, 'compete_weeks_minutes' => 7 * 1440 * 0]);

        $diff = $datetimediff->GetDateTimeDiff('2020-07-05T14:30:02+09:30', '2020-07-11T14:30:02+09:30');
        $this->assertEquals($diff, ['days_minutes' => 1440 * 6, 'weekdays_minutes' => 1440 * 5, 'compete_weeks_minutes' => 7 * 1440 * 0]);

        $diff = $datetimediff->GetDateTimeDiff('2020-07-05T14:30:02+09:30', '2020-07-19T14:30:02+09:30');
        $this->assertEquals($diff, ['days_minutes' => 1440 * 14, 'weekdays_minutes' => 1440 * 10, 'compete_weeks_minutes' => 7 * 1440 * 2]);
        
        $diff = $datetimediff->GetDateTimeDiff('2020-07-16T14:30:02+09:30', '2020-07-23T14:30:02+09:30');
        $this->assertEquals($diff, ['days_minutes' => 1440 * 7, 'weekdays_minutes' => 1440 * 5, 'compete_weeks_minutes' => 7 * 1440 * 1]);
    }
}
