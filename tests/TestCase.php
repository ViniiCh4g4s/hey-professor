<?php

namespace Tests;

use Illuminate\Foundation\Testing\{RefreshDatabase, TestCase as BaseTestCase};

abstract class TestCase extends BaseTestCase
{
    use RefreshDatabase; // This trait will refresh the database before each test
}
