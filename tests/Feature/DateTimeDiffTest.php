<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\Refreshresponsebase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DateTimeDiffTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('http://127.0.0.1:8000/api/v1/datetimediff/2020-07-22/2020-07-13/');
        $response->assertStatus(200);
        $this->assertEquals($response->getData()->code, 200);
        $this->assertEquals($response->getData()->state, 'success');
        $this->assertEquals($response->getData()->message, 'Date time diff query succeed.');
        $this->assertEquals($response->getData()->data->days, 9);
        $this->assertEquals($response->getData()->data->weekdays, 7);
        $this->assertEquals($response->getData()->data->compete_weeks, 1);

        $response = $this->get('http://127.0.0.1:8000/api/v1/datetimediff/2020-07-122/2020-07-13/');
        $response->assertStatus(200);
        $this->assertEquals($response->getData()->code, 40012);
        $this->assertEquals($response->getData()->state, 'error');
        $this->assertEquals($response->getData()->message, 'The start datetime format is not ISO 8601 format.');
        
        $response = $this->get('http://127.0.0.1:8000/api/v1/datetimediff/2020-07-22/2020-07-113/');
        $response->assertStatus(200);
        $this->assertEquals($response->getData()->code, 40012);
        $this->assertEquals($response->getData()->state, 'error');
        $this->assertEquals($response->getData()->message, 'The end datetime format is not ISO 8601 format.');
        
        $response = $this->get('http://127.0.0.1:8000/api/v1/datetimediff/2020-07-22/2020-07-13/second');
        $response->assertStatus(200);
        $this->assertEquals($response->getData()->code, 40012);
        $this->assertEquals($response->getData()->state, 'error');
        $this->assertEquals($response->getData()->message, 'The filter format is wrong.');

        $response = $this->get('http://127.0.0.1:8000/api/v1/datetimediff/2020-07-22/2020-07-13/seconds');
        $response->assertStatus(200);
        $this->assertEquals($response->getData()->code, 200);
        $this->assertEquals($response->getData()->state, 'success');
        $this->assertEquals($response->getData()->message, 'Date time diff query succeed.');
        $this->assertEquals($response->getData()->data->days_seconds, 777600);
        $this->assertEquals($response->getData()->data->weekdays_seconds, 604800);
        $this->assertEquals($response->getData()->data->compete_weeks_seconds, 604800);
    }
}
