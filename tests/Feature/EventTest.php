<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EventTest extends TestCase
{
    
    public function setUp() :void
    {
        parent::setUp();
    }

    /**
     * Test for event
     * adding multiple events test 
     *
     * @return void
     */
    public function test_a_event_request_add_multiple_events()
    {
        $data = [
            'description'   => 'test user',
            'dates' => [date("Y-m-d")],
            'year'  => date("Y"),
            'month' => date("m"),
        ];

        $res = $this->json('POST', '/api/v1/event/add-multiple', $data)
            ->assertStatus(200);
    }

    /**
     * Test for event
     * get events by year and month test 
     *
     * @return void
     */
    public function test_a_event_request_get_events_by_year_month()
    {
        $data = [
            'year'  => date("Y"),
            'month' => date("m"),
        ];

        $res = $this->json('GET', '/api/v1/event/get-by-year-month', $data)
            ->assertStatus(200);
    }
}
