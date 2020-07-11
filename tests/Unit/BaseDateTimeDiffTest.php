<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Libraries\Classes\DateTimeDiff\BaseDateTimeDiff;
use Carbon\Carbon;

class BaseDateTimeDiffTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $datetimediff = new BaseDateTimeDiff();

        /****************************************************************************************/
        /* old test, directly use Carbon::diffInWeekdays function, but weekdays is greater than weekdays, 
        /* which is obviously wrong, so the algorithm should be improved
        /* 
        // $diff = $datetimediff->GetDateTimeDiff('2020-07-10T23:59:59', '2020-07-11');
        // $this->assertEquals($diff, ['days' => 0, 'weekdays' => 1, 'compete_weeks' => 0]);

        // $diff = $datetimediff->GetDateTimeDiff('2020-07-09', '2020-07-10');
        // $this->assertEquals($diff, ['days' => 1, 'weekdays' => 1, 'compete_weeks' => 0]);

        // $diff = $datetimediff->GetDateTimeDiff('2020-07-10', '2020-07-11');
        // $this->assertEquals($diff, ['days' => 1, 'weekdays' => 1, 'compete_weeks' => 0]);

        // $diff = $datetimediff->GetDateTimeDiff('2020-07-11', '2020-07-12');
        // $this->assertEquals($diff, ['days' => 1, 'weekdays' => 0, 'compete_weeks' => 0]);

        // $diff = $datetimediff->GetDateTimeDiff('2020-07-12', '2020-07-13');
        // $this->assertEquals($diff, ['days' => 1, 'weekdays' => 0, 'compete_weeks' => 0]);

        // $diff = $datetimediff->GetDateTimeDiff('2020-07-10T23:59:59', '2020-07-12');
        // $this->assertEquals($diff, ['days' => 1, 'weekdays' => 1, 'compete_weeks' => 0]);

        // $diff = $datetimediff->GetDateTimeDiff('2020-07-10T23:59:59', '2020-07-11');
        // $this->assertEquals($diff, ['days' => 0, 'weekdays' => 1, 'compete_weeks' => 0]);

        // $diff = $datetimediff->GetDateTimeDiff('2020-01-01', '2020-01-10');
        // $this->assertEquals($diff, ['days' => 9, 'weekdays' => 7, 'compete_weeks' => 1]);

        // $diff = $datetimediff->GetDateTimeDiff('2019-12-31', '2020-01-9');
        // $this->assertEquals($diff, ['days' => 9, 'weekdays' => 7, 'compete_weeks' => 1]);

        // $diff = $datetimediff->GetDateTimeDiff('2019-12-31T10:00:00', '2020-01-07T09:00:00');
        // $this->assertEquals($diff, ['days' => 6, 'weekdays' => 5, 'compete_weeks' => 0]);

        // $diff = $datetimediff->GetDateTimeDiff('2020-07-10T11:59:59+12:30', '2020-07-11');
        // $this->assertEquals($diff, ['days' => 1, 'weekdays' => 1, 'compete_weeks' => 0]);

        // $diff = $datetimediff->GetDateTimeDiff('2020-07-10T11:00:00+11:30', '2020-07-11');
        // $this->assertEquals($diff, ['days' => 1, 'weekdays' => 1, 'compete_weeks' => 0]);

        // $diff = $datetimediff->GetDateTimeDiff('2020-07-09T23:30:00', '2020-07-11');
        // $this->assertEquals($diff, ['days' => 1, 'weekdays' => 2, 'compete_weeks' => 0]);

        // $diff = $datetimediff->GetDateTimeDiff('2020-07-09T23:30:00', '2020-07-10T11:00:00+11:30');
        // $this->assertEquals($diff, ['days' => 0, 'weekdays' => 0, 'compete_weeks' => 0]);
 
        // $diff = $datetimediff->GetDateTimeDiff('2020-07-09T23:30:00', '2020-07-10T11:00:01+11:30');
        // $this->assertEquals($diff, ['days' => 0, 'weekdays' => 1, 'compete_weeks' => 0]);   

        // $diff = $datetimediff->GetDateTimeDiff('2020-07-10T23:30:00', '2020-07-13T23:00:00');
        // $this->assertEquals($diff, ['days' => 2, 'weekdays' => 1, 'compete_weeks' => 0]);
        
        // $diff = $datetimediff->GetDateTimeDiff('2020-07-10T23:00:00', '2020-07-13T23:00:01');
        // $this->assertEquals($diff, ['days' => 3, 'weekdays' => 2, 'compete_weeks' => 0]);

        // $diff = $datetimediff->GetDateTimeDiff('2020-07-11T23:00:00', '2020-07-13T23:00:01');
        // $this->assertEquals($diff, ['days' => 2, 'weekdays' => 1, 'compete_weeks' => 0]);

        // $diff = $datetimediff->GetDateTimeDiff('2020-07-11T23:00:00+09:30', '2020-07-13T23:00:01+09:30');
        // $this->assertEquals($diff, ['days' => 2, 'weekdays' => 1, 'compete_weeks' => 0]);

        // $diff = $datetimediff->GetDateTimeDiff('2020-07-10T23:00:00+09:30', '2020-07-10T23:00:01+09:30');
        // $this->assertEquals($diff, ['days' => 0, 'weekdays' => 1, 'compete_weeks' => 0]);

        // $diff = $datetimediff->GetDateTimeDiff('2020-07-09T23:00:02+09:30', '2020-07-10T23:00:01+09:30');
        // $this->assertEquals($diff, ['days' => 0, 'weekdays' => 1, 'compete_weeks' => 0]);
         
        // $diff = $datetimediff->GetDateTimeDiff('2020-07-10T23:00:02+09:30', '2020-07-11T23:00:03+09:30');
        // $this->assertEquals($diff, ['days' => 1, 'weekdays' => 1, 'compete_weeks' => 0]);

        // $diff = $datetimediff->GetDateTimeDiff('2020-07-12T23:00:02+09:30', '2020-07-13T23:00:03+09:30');
        // $this->assertEquals($diff, ['days' => 1, 'weekdays' => 1, 'compete_weeks' => 0]);
        
        // $diff = $datetimediff->GetDateTimeDiff('2020-07-11T23:00:02+09:30', '2020-07-13T23:00:03+09:30');
        // $this->assertEquals($diff, ['days' => 2, 'weekdays' => 1, 'compete_weeks' => 0]);
       
        // $diff = $datetimediff->GetDateTimeDiff('2020-07-11T00:00:02+09:30', '2020-07-11T23:00:03+09:30');
        // $this->assertEquals($diff, ['days' => 0, 'weekdays' => 0, 'compete_weeks' => 0]);
 
        // $diff = $datetimediff->GetDateTimeDiff('2020-07-10T14:30:02', '2020-07-11T23:00:03+09:30');
        // $this->assertEquals($diff, ['days' => 0, 'weekdays' => 1, 'compete_weeks' => 0]);
 
        // $diff = $datetimediff->GetDateTimeDiff('2020-07-10T23:30:00', '2020-07-13T23:30:00');//2
        // $diff = $datetimediff->GetDateTimeDiff('2020-07-10T23:30:00', '2020-07-14T23:30:00');//3
        /* 
        /* end of old test
        /****************************************************************************************/ 
 
        /****************************************************************************************/
        /*  check Carbon::diffInWeekdays function
        /* 
        $diff = $datetimediff->GetDateTimeDiff('2020-07-06T14:30:02+09:30', '2020-07-10T23:00:03+09:30');
        $diff = $datetimediff->GetDateTimeDiff('2020-07-05T14:30:02+09:30', '2020-07-10T23:00:03+09:30');
        $diff = $datetimediff->GetDateTimeDiff('2020-07-06T14:30:02+09:30', '2020-07-11T23:00:03+09:30');
        $diff = $datetimediff->GetDateTimeDiff('2020-07-05T14:30:02+09:30', '2020-07-11T23:00:03+09:30');

        $diff = $datetimediff->GetDateTimeDiff('2020-07-06T14:30:02+09:30', '2020-07-10T11:00:03+09:30');
        $diff = $datetimediff->GetDateTimeDiff('2020-07-05T14:30:02+09:30', '2020-07-10T11:00:03+09:30');
        $diff = $datetimediff->GetDateTimeDiff('2020-07-06T14:30:02+09:30', '2020-07-11T11:00:03+09:30');
        $diff = $datetimediff->GetDateTimeDiff('2020-07-05T14:30:02+09:30', '2020-07-11T11:00:03+09:30');

        $diff = $datetimediff->GetDateTimeDiff('2020-07-06T14:30:02+09:30', '2020-07-10T14:30:02+09:30');
        $diff = $datetimediff->GetDateTimeDiff('2020-07-05T14:30:02+09:30', '2020-07-10T14:30:02+09:30');
        $diff = $datetimediff->GetDateTimeDiff('2020-07-06T14:30:02+09:30', '2020-07-11T14:30:02+09:30');
        $diff = $datetimediff->GetDateTimeDiff('2020-07-05T14:30:02+09:30', '2020-07-11T14:30:02+09:30');
        /* end of check
        /****************************************************************************************/ 

        $diff = $datetimediff->GetDateTimeDiff('2020-07-10T11:59:59', '2020-07-11');
        $this->assertEquals($diff, ['days' => 0, 'weekdays' => 0, 'compete_weeks' => 0]);

        $diff = $datetimediff->GetDateTimeDiff('2020-07-10T23:30:00', '2020-07-13T23:00:00');
        $this->assertEquals($diff, ['days' => 2, 'weekdays' => 1, 'compete_weeks' => 0]);
        
        $diff = $datetimediff->GetDateTimeDiff('2020-07-10T23:00:00', '2020-07-13T23:00:01');
        $this->assertEquals($diff, ['days' => 3, 'weekdays' => 1, 'compete_weeks' => 0]);

        $diff = $datetimediff->GetDateTimeDiff('2020-07-11T23:00:00', '2020-07-13T23:00:01');
        $this->assertEquals($diff, ['days' => 2, 'weekdays' => 1, 'compete_weeks' => 0]);

        $diff = $datetimediff->GetDateTimeDiff('2020-07-11T23:00:00+09:30', '2020-07-13T23:00:01+09:30');
        $this->assertEquals($diff, ['days' => 2, 'weekdays' => 0, 'compete_weeks' => 0]);

        $diff = $datetimediff->GetDateTimeDiff('2020-07-10T23:00:02+09:30', '2020-07-10T23:00:01+09:30');
        $this->assertEquals($diff, ['days' => 0, 'weekdays' => 0, 'compete_weeks' => 0]);

        $diff = $datetimediff->GetDateTimeDiff('2020-07-10T23:00:02+09:30', '2020-07-10T23:00:01+09:30');
        $this->assertEquals($diff, ['days' => 0, 'weekdays' => 0, 'compete_weeks' => 0]);
      
        $diff = $datetimediff->GetDateTimeDiff('2020-07-10T23:00:02+09:30', '2020-07-11T23:00:03+09:30');
        $this->assertEquals($diff, ['days' => 1, 'weekdays' => 0, 'compete_weeks' => 0]);

        $diff = $datetimediff->GetDateTimeDiff('2020-07-12T23:00:02+09:30', '2020-07-13T23:00:03+09:30');
        $this->assertEquals($diff, ['days' => 1, 'weekdays' => 0, 'compete_weeks' => 0]);
        
        $diff = $datetimediff->GetDateTimeDiff('2020-07-11T23:00:02+09:30', '2020-07-13T23:00:03+09:30');
        $this->assertEquals($diff, ['days' => 2, 'weekdays' => 0, 'compete_weeks' => 0]);
       
        $diff = $datetimediff->GetDateTimeDiff('2020-07-11T00:00:02+09:30', '2020-07-11T23:00:03+09:30');
        $this->assertEquals($diff, ['days' => 0, 'weekdays' => 0, 'compete_weeks' => 0]);
 
        $diff = $datetimediff->GetDateTimeDiff('2020-07-10T14:30:02', '2020-07-11T23:00:03+09:30');
        $this->assertEquals($diff, ['days' => 0, 'weekdays' => 0, 'compete_weeks' => 0]);

        $diff = $datetimediff->GetDateTimeDiff('2020-07-06T14:30:02+09:30', '2020-07-10T23:00:03+09:30');
        $this->assertEquals($diff, ['days' => 4, 'weekdays' => 4, 'compete_weeks' => 0]);

        $diff = $datetimediff->GetDateTimeDiff('2020-07-05T14:30:02+09:30', '2020-07-10T23:00:03+09:30');
        $this->assertEquals($diff, ['days' => 5, 'weekdays' => 4, 'compete_weeks' => 0]);
       
        $diff = $datetimediff->GetDateTimeDiff('2020-07-05T14:30:02+09:30', '2020-07-11T23:00:03+09:30');
        $this->assertEquals($diff, ['days' => 6, 'weekdays' => 5, 'compete_weeks' => 0]);

        $diff = $datetimediff->GetDateTimeDiff('2020-07-05T14:30:02+09:30', '2020-07-11T00:00:03+09:30');
        $this->assertEquals($diff, ['days' => 5, 'weekdays' => 5, 'compete_weeks' => 0]);

        $diff = $datetimediff->GetDateTimeDiff('2020-07-05T14:30:02+09:30', '2020-07-05T00:00:03+09:30');
        $this->assertEquals($diff, ['days' => 0, 'weekdays' => 0, 'compete_weeks' => 0]);

        $diff = $datetimediff->GetDateTimeDiff('2020-07-05T14:30:02+09:30', '2020-07-06T00:00:03+09:30');
        $this->assertEquals($diff, ['days' => 0, 'weekdays' => 0, 'compete_weeks' => 0]);

        $diff = $datetimediff->GetDateTimeDiff('2020-07-05T14:30:02+09:30', '2020-07-06T20:00:03+09:30');
        $this->assertEquals($diff, ['days' => 1, 'weekdays' => 0, 'compete_weeks' => 0]);

        $diff = $datetimediff->GetDateTimeDiff('2020-07-05T14:30:02+09:30', '2020-07-06T14:31:02+09:30+09:30');
        $this->assertEquals($diff, ['days' => 1, 'weekdays' => 0, 'compete_weeks' => 0]);

        $diff = $datetimediff->GetDateTimeDiff('2020-07-08T14:30:02+09:30', '2020-07-09T14:31:02+09:30+09:30');
        $this->assertEquals($diff, ['days' => 1, 'weekdays' => 1, 'compete_weeks' => 0]); 

        $diff = $datetimediff->GetDateTimeDiff('2020-07-08T14:30:02+09:30', '2020-07-09T14:30:02+09:30+09:30');
        $this->assertEquals($diff, ['days' => 1, 'weekdays' => 1, 'compete_weeks' => 0]);
        
        $diff = $datetimediff->GetDateTimeDiff('2020-07-08T14:30:02+09:30', '2020-07-09T14:30:01+09:30+09:30');
        $this->assertEquals($diff, ['days' => 0, 'weekdays' => 0, 'compete_weeks' => 0]);

        $diff = $datetimediff->GetDateTimeDiff('2020-07-06T14:30:02+09:30', '2020-07-10T23:00:03+09:30');
        $this->assertEquals($diff, ['days' => 4, 'weekdays' => 4, 'compete_weeks' => 0]);

        $diff = $datetimediff->GetDateTimeDiff('2020-07-05T14:30:02+09:30', '2020-07-10T23:00:03+09:30');
        $this->assertEquals($diff, ['days' => 5, 'weekdays' => 4, 'compete_weeks' => 0]);

        $diff = $datetimediff->GetDateTimeDiff('2020-07-06T14:30:02+09:30', '2020-07-11T23:00:03+09:30');
        $this->assertEquals($diff, ['days' => 5, 'weekdays' => 4, 'compete_weeks' => 0]);

        $diff = $datetimediff->GetDateTimeDiff('2020-07-05T14:30:02+09:30', '2020-07-11T23:00:03+09:30');
        $this->assertEquals($diff, ['days' => 6, 'weekdays' => 5, 'compete_weeks' => 0]);

        $diff = $datetimediff->GetDateTimeDiff('2020-07-06T14:30:02+09:30', '2020-07-10T11:00:03+09:30');
        $this->assertEquals($diff, ['days' => 3, 'weekdays' => 3, 'compete_weeks' => 0]);

        $diff = $datetimediff->GetDateTimeDiff('2020-07-05T14:30:02+09:30', '2020-07-10T11:00:03+09:30');
        $this->assertEquals($diff, ['days' => 4, 'weekdays' => 4, 'compete_weeks' => 0]);

        $diff = $datetimediff->GetDateTimeDiff('2020-07-06T14:30:02+09:30', '2020-07-11T11:00:03+09:30');
        $this->assertEquals($diff, ['days' => 4, 'weekdays' => 4, 'compete_weeks' => 0]);

        $diff = $datetimediff->GetDateTimeDiff('2020-07-05T14:30:02+09:30', '2020-07-11T11:00:03+09:30');
        $this->assertEquals($diff, ['days' => 5, 'weekdays' => 5, 'compete_weeks' => 0]);

        $diff = $datetimediff->GetDateTimeDiff('2020-07-06T14:30:02+09:30', '2020-07-10T14:30:02+09:30');
        $this->assertEquals($diff, ['days' => 4, 'weekdays' => 4, 'compete_weeks' => 0]);

        $diff = $datetimediff->GetDateTimeDiff('2020-07-05T14:30:02+09:30', '2020-07-10T14:30:02+09:30');
        $this->assertEquals($diff, ['days' => 5, 'weekdays' => 4, 'compete_weeks' => 0]);

        $diff = $datetimediff->GetDateTimeDiff('2020-07-06T14:30:02+09:30', '2020-07-11T14:30:02+09:30');
        $this->assertEquals($diff, ['days' => 5, 'weekdays' => 4, 'compete_weeks' => 0]);

        $diff = $datetimediff->GetDateTimeDiff('2020-07-05T14:30:02+09:30', '2020-07-11T14:30:02+09:30');
        $this->assertEquals($diff, ['days' => 6, 'weekdays' => 5, 'compete_weeks' => 0]);

        $diff = $datetimediff->GetDateTimeDiff('2020-07-05T14:30:02+09:30', '2020-07-19T14:30:02+09:30');
        $this->assertEquals($diff, ['days' => 14, 'weekdays' => 10, 'compete_weeks' => 2]);
        
        $diff = $datetimediff->GetDateTimeDiff('2020-07-16T14:30:02+09:30', '2020-07-23T14:30:02+09:30');
        $this->assertEquals($diff, ['days' => 7, 'weekdays' => 5, 'compete_weeks' => 1]);
    }
}
