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
        if ($param === null || $param === '')
        {
            return 1;
        }
        
        return $this->IsFormatValid($param);
    }
    
    /**
     * @param string $param
     * @return int
     */
    abstract protected function IsFormatValid(string $param) : int;
}