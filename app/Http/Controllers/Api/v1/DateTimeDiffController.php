<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        return [];
    }
}
