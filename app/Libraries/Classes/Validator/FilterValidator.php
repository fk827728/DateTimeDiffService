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
        if ($param === null)
        {
            $param = 'Base';
        }
        else if (ucfirst(strtolower($param)) === 'Base')
        {
            $param = 'Other';
        }
        return $param;
    }

    /**
     * @param string $param
     * @return int
     */
    protected function IsFormatValid(string $param) : int
    {
        $param = ucfirst(strtolower($param));
        $valid_array = ['Base', 'Seconds', 'Minutes', 'Hours', 'Years'];
        if (in_array($param, $valid_array))
        {
            return 0;
        }
        return 2;
    }
}