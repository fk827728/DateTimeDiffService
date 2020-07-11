<?php
namespace App\Libraries\Classes\Validator;

use App\Libraries\Classes\Validator\Validator;

/**
 * @method string Transfer($param)
 * @method int IsFormatValid(string $param)
 */
class FilterValidator extends Validator
{
    /**
     * @param $param
     * @return string
     */
    public function Transfer($param) : string
    {
        return '';
    }

    /**
     * @param string $param
     * @return int
     */
    protected function IsFormatValid(string $param) : int
    {
        return 0;
    }
}