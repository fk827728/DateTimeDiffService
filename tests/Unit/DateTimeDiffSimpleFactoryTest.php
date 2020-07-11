<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Libraries\Classes\SimpleFactory\DateTimeDiffSimpleFactory;
use App\Libraries\Classes\DateTimeDiff\BaseDateTimeDiff;
use App\Libraries\Classes\DateTimeDiff\SecondsDateTimeDiff;
use App\Libraries\Classes\DateTimeDiff\MinutesDateTimeDiff;
use App\Libraries\Classes\DateTimeDiff\HoursDateTimeDiff;
use App\Libraries\Classes\DateTimeDiff\YearsDateTimeDiff;

class DateTimeDiffSimpleFactoryTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $factory = new DateTimeDiffSimpleFactory();

        $instance = $factory->CreateInstance('Base');
        $this->assertInstanceOf(BaseDateTimeDiff::class, $instance);
        
        $instance = $factory->CreateInstance('Seconds');
        $this->assertInstanceOf(SecondsDateTimeDiff::class, $instance);
        
        $instance = $factory->CreateInstance('Minutes');
        $this->assertInstanceOf(MinutesDateTimeDiff::class, $instance);
        
        $instance = $factory->CreateInstance('Hours');
        $this->assertInstanceOf(HoursDateTimeDiff::class, $instance);
        
         $instance = $factory->CreateInstance('Years');
        $this->assertInstanceOf(YearsDateTimeDiff::class, $instance);
    }
}
