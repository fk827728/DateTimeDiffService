<?php
namespace App\Libraries\Classes\Validator;

/**
 * @method int IsValid(string $param)
 * @method int IsFormatValid(string $param)
 */
abstract class Validator
{
    /**
     * @param $param
     * @return int
     */
    public function IsValid($param) : int
    {
        return 0;
    }
    
    /**
     * @param string $param
     * @return int
     */
    abstract protected function IsFormatValid(string $param) : int;
}