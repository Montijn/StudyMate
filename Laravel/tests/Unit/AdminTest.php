<?php

namespace Tests\Unit;

use Tests\TestCase;

class AdminTest extends TestCase
{

    /** @test */
    public function GuestUnauthorizedTest()
    {

        $response = $this->get('/teacheroverview');
        $response->assertStatus(500);
    }
}
