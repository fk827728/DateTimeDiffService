<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Libraries\Classes\Validator\FilterValidator;

class FilterValidatorTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $validator = new FilterValidator;

        $this->assertEquals($validator->IsValid(''), 1);
        $this->assertEquals($validator->IsValid(null), 1);
        
        $this->assertEquals($validator->IsValid('seconds'), 0);
        $this->assertEquals($validator->IsValid('Seconds'), 0);
        $this->assertEquals($validator->IsValid('secOnds'), 0);
        $this->assertEquals($validator->IsValid('minutes'), 0);
        $this->assertEquals($validator->IsValid('Minutes'), 0);
        $this->assertEquals($validator->IsValid('MiNutes'), 0);
        $this->assertEquals($validator->IsValid('MinuteS'), 0);
        $this->assertEquals($validator->IsValid('Hours'), 0);
        $this->assertEquals($validator->IsValid('hours'), 0);
        $this->assertEquals($validator->IsValid('hourS'), 0);
        $this->assertEquals($validator->IsValid('hOuRs'), 0);
        $this->assertEquals($validator->IsValid('basE'), 0);
        $this->assertEquals($validator->IsValid('Base'), 0);
        $this->assertEquals($validator->IsValid('base'), 0);
        $this->assertEquals($validator->IsValid('years'), 0);
        $this->assertEquals($validator->IsValid('years'), 0);
        $this->assertEquals($validator->IsValid('Years'), 0);
        $this->assertEquals($validator->IsValid('yeaRs'), 0);
        $this->assertEquals($validator->IsValid('yEarS'), 0);

        $this->assertEquals($validator->IsValid('Hello'), 2);
        $this->assertEquals($validator->IsValid('World'), 2);
        $this->assertEquals($validator->IsValid('second'), 2);
        $this->assertEquals($validator->IsValid('day'), 2);
        
        $this->assertEquals($validator->Transfer(null), 'Base');
        $this->assertEquals($validator->Transfer('Base'), 'Other'); 
        $this->assertEquals($validator->Transfer('base'), 'Other'); 
        $this->assertEquals($validator->Transfer('baSe'), 'Other'); 
        $this->assertEquals($validator->Transfer('BaSe'), 'Other'); 
        $this->assertEquals($validator->Transfer(''), ''); 
        $this->assertEquals($validator->Transfer('Seconds'), 'Seconds'); 
        $this->assertEquals($validator->Transfer('1'), '1'); 
    }
}
