<?php

namespace App\Http\Controllers\Api\Event;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Event\AddMultipleEventRequest;
use App\Model\Event;

class AddMultipleEventController extends Controller
{
    /**
     * Handle the incoming request.
     * Add multiple events
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(AddMultipleEventRequest $request)
    {
        try {
            foreach($request->dates as $date) {
                $event = Event::updateOrCreate(
                    [
                        'date' => $date
                    ],
                    [
                        'description'   => $request->description,
                        'date'          => $date,
                    ]
                );
            }
        
            return response()->json([
                'message'   => 'Successful! Adding multiple events.',
                'events'    => Event::getByYearMonth($request->year, $request->month),
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
