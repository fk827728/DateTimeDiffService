<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Libraries\Classes\Validator\DateTimeValidator;
use App\Libraries\Classes\Validator\FilterValidator;
use App\Libraries\Classes\DateTimeDiff\DateTimeDiffTools;

/**
 * @method DateTimeDiff(Request $request, $start, $end, $filter = null)
 */
class DateTimeDiffController extends Controller
{
    /**
     * @param Request $request
     * @param $start
     * @param $end
     * @param $filter = null
     * @return array
     */
    public function DateTimeDiff(Request $request, $start, $end, $filter = null)
    {
        $result = [];
        try
        {
            //validate parameters
            $validator = new DateTimeValidator;
            $ret = $validator->IsValid($start);

            if ($ret === 1)
            {
                $result['code'] = 40011;  
                $result['state'] = 'error';
                $result['message'] = 'The start datetime is empty.';
                
                return $result;
            }
            else if ($ret === 2)
            {
                $result['code'] = 40012;  
                $result['state'] = 'error';
                $result['message'] = 'The start datetime format is not ISO 8601 format.';

                return $result;
            }

            $validator = new DateTimeValidator;
            $ret = $validator->IsValid($end);

            if ($ret === 1)
            {
                $result['code'] = 40011;  
                $result['state'] = 'error';
                $result['message'] = 'The end datetime is empty.';

                return $result;
            }
            else if ($ret === 2)
            {
                $result['code'] = 40012;  
                $result['state'] = 'error';
                $result['message'] = 'The end datetime format is not ISO 8601 format.';

                return $result;
            }

            $validator = new FilterValidator;
            $filter = $validator->Transfer($filter);
            $ret = $validator->IsValid($filter);

            if ($ret === 1)
            {
                $result['code'] = 40011;  
                $result['state'] = 'error';
                $result['message'] = 'The filter is empty.';

                return $result;
            }
            else if ($ret === 2)
            {
                $result['code'] = 40012;  
                $result['state'] = 'error';
                $result['message'] = 'The filter format is wrong.';

                return $result;
            }

            $datetimediff_tools = new DateTimeDiffTools($filter);
            $ret = $datetimediff_tools->GetDateTimeDiff($start, $end);

            $result['code'] = 200;  
            $result['state'] = 'success';
            $result['message'] = 'Date time diff query succeed.';
            $result['data'] = $ret;

            return $result;
        }
        catch (\Exception $exp)
        {
            header('HTTP/1.1 500 Internal Server Error');
            $result['code'] = 500;  
            $result['state'] = 'error';
            $result['message'] = $exp->getMessage();

            return $result;
        }

        return $result;
    }
}
