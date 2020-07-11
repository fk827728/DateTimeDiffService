<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Libraries\Classes\Validator\DateTimeValidator;

class DateTimeValidatorTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $validator = new DateTimeValidator;

        $this->assertEquals($validator->IsValid(''), 1);
        $this->assertEquals($validator->IsValid(null), 1);
 
        $this->assertEquals($validator->IsValid('2020-01-01'), 0);
        $this->assertEquals($validator->IsValid('2020-1-01'), 0);
        $this->assertEquals($validator->IsValid('2020-01-1'), 0);
        $this->assertEquals($validator->IsValid('2020-1-1'), 0);
        $this->assertEquals($validator->IsValid('202-01-01'), 2);
        $this->assertEquals($validator->IsValid('20200-01-01'), 2);
        $this->assertEquals($validator->IsValid('2020-01-001'), 2);
        $this->assertEquals($validator->IsValid('2020-01-001'), 2);
        $this->assertEquals($validator->IsValid('2020-001-001'), 2);
        $this->assertEquals($validator->IsValid('2020-0-01'), 2);
        $this->assertEquals($validator->IsValid('2020-1-0'), 2);
        $this->assertEquals($validator->IsValid('2020-0-0'), 2);
        $this->assertEquals($validator->IsValid('2020-13-01'), 2);
        $this->assertEquals($validator->IsValid('2020-01-32'), 2);
        $this->assertEquals($validator->IsValid('2020-21-01'), 2);
        $this->assertEquals($validator->IsValid('2020-01-41'), 2);
        
        $this->assertEquals($validator->IsValid('2020-01-01T12:00:00'), 0);
        $this->assertEquals($validator->IsValid('2020-01-01T1:00:00'), 0);
        $this->assertEquals($validator->IsValid('2020-01-01T12:0:00'), 0);
        $this->assertEquals($validator->IsValid('2020-01-01T12:00:0'), 0);
        $this->assertEquals($validator->IsValid('2020-01-01T12:0:0'), 0);
        $this->assertEquals($validator->IsValid('2020-01-01T1:00:0'), 0);
        $this->assertEquals($validator->IsValid('2020-01-01T1:0:00'), 0);
        $this->assertEquals($validator->IsValid('2020-01-01T1:0:0'), 0);
        $this->assertEquals($validator->IsValid('2020-01-01T001:00:00'), 2);
        $this->assertEquals($validator->IsValid('2020-01-01T01:001:00'), 2);
        $this->assertEquals($validator->IsValid('2020-01-01T01:00:001'), 2);
        $this->assertEquals($validator->IsValid('2020-01-01T24:00:00'), 2);
        
        $this->assertEquals($validator->IsValid('2020-01-01T12:00:00+01:00'), 0);
        $this->assertEquals($validator->IsValid('2020-01-01T12:00:00-01:00'), 0);
        $this->assertEquals($validator->IsValid('2020-01-01T12:00:00+01:30'), 0);
        $this->assertEquals($validator->IsValid('2020-01-01T12:00:00-01:30'), 0);
        $this->assertEquals($validator->IsValid('2020-01-01T12:00:00+1:0'), 0);
        $this->assertEquals($validator->IsValid('2020-01-01T12:00:00+1:30'), 0);
        $this->assertEquals($validator->IsValid('2020-01-01T12:00:00+12:30'), 0);
        $this->assertEquals($validator->IsValid('2020-01-01T12:00:00+13:30'), 2);
        $this->assertEquals($validator->IsValid('2020-01-01T12:00:00+21:30'), 2);
        $this->assertEquals($validator->IsValid('2020-01-01T12:00:00+01:40'), 2);
        $this->assertEquals($validator->IsValid('2020-01-01T12:00:00+01:01'), 2);
        $this->assertEquals($validator->IsValid('2020-01-01T12:00:00+01:31'), 2);
        $this->assertEquals($validator->IsValid('2020-01-01T12:00:00*01:31'), 2);
    }
}
