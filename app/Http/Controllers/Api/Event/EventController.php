<?php

namespace App\Http\Controllers\Api\Event;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Event;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            return response()->json([
                'message'   => 'Successful! Getting the events.',
                'events'  => Event::get(),
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $event = Event::create($request->only([
                'description',
                'date',
            ]));

            return response()->json([
                'message'   => 'Successful! Adding a new event.',
                'event'     => $event,
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
}
