<?php

namespace App\Http\Controllers\Api\Event;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Event;

class GetByYearMonthController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        try {
            return response()->json([
                'message'   => 'Successful! Getting the events by year and month.',
                'events'  => Event::getByYearMonth($request->year, $request->month),
            ], 200); 
        } catch (Exception $e) {
            $status = 400;

            if ($this->isHttpException($e)) {
                $status = $e->getStatusCode();
            }
            return response()->json([
                'message'   => 'Something went wrong.'
            ], $status); 
        }
    }
}
