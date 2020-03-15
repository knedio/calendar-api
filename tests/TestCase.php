<?php

namespace Tests;

use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, RefreshDatabase, WithFaker;

    public function setUp() :void
    {
        parent::setUp();
        $this->initCommand();
    }

    protected function initCommand()
    {
        $this->artisan('passport:install', ['--force' => true]);
    }

}
