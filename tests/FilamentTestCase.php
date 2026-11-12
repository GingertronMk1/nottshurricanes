<?php

namespace Tests;

use App\Models\User;

abstract class FilamentTestCase extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs(User::factory()->create());
    }
}
